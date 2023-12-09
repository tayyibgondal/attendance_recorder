<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentTeacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index($id)
    {
        // Get student's personal information
        $student = Student::find($id);
        $name = $student->name;
        $email = $student->email;
        $rollno = $student->rollno;

        // Get student's courses with their teachers 
        $courses = $student->courses()->get(); // Note for one to many relationship, we use courses() instead of courses

        // Loop through courses to get attendance for each course
        // Initialize arrays to store attendance
        $attendanceData = [];
        foreach ($courses as $course) {
            $teacherId = $course->teacher->id;
            // Get attendance for the student in the current course
            $attendanceRecords = StudentTeacher::where('student_id', $id)
                ->where('teacher_id', $teacherId)
                ->get();

            // Calculate attendance statistics
            $totalAttendance = $attendanceRecords->count();
            $presentCount = $attendanceRecords->where('attendance_status', 'present')->count();
            $percentageAttendance = $totalAttendance > 0 ? ($presentCount / $totalAttendance) * 100 : 0;
            $absentCount = $totalAttendance - $presentCount;

            // Store attendance data for the course
            $attendanceData[] = [
                'course_id' => $course->id,
                'course_name' => $course->name,
                'teacher_name' => $course->teacher->name,
                'percentage_attendance' => $percentageAttendance,
                'total_attendance' => $totalAttendance,
                'absent_count' => $absentCount,
            ];
        }

        return view('students.index', [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'rollno' => $rollno,
            'attendanceData' => $attendanceData,
        ]);
    }

    public function details($sid, $cid)
    {
        // Get teacher name and course name
        $teacherName = Course::find($cid)->teacher->name;
        $courseName = Course::find($cid)->name;

        // Get attendance records
        $teacherId = Course::find($cid)->teacher->id;
        $attendances = StudentTeacher::where('student_id', $sid)
            ->where('teacher_id', $teacherId)
            ->get();

        return view('students.details', [
            'teacherName' => $teacherName,
            'courseName' => $courseName,
            'attendances' => $attendances,
        ]);
    }
}
