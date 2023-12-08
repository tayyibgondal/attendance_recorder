<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Teacher;
use App\Models\StudentTeacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function indexTeacher($tid)
    {
        $name = Teacher::find($tid)->name;
        $email = Teacher::find($tid)->email;
        $course = Teacher::find($tid)->course->name;

        return view('teachers.index', ['tid' => $tid, 'name' => $name, 'email' => $email, 'course' => $course]);
    }

    public function takeAttendance($tid)
    {
        // Find all students corresponding to this teacher's course
        $course_id = Teacher::find($tid)->course->id;
        $course_students = CourseStudent::where('course_id', $course_id)->get();

        $students = [];
        foreach ($course_students as $course_student) {
            $student_id = $course_student->student_id;
            $student = Student::find($student_id);
            array_push($students, $student);
        }

        $date = date('Y-m-d H:i:s');
        // Send those students to the view
        return view('teachers.take-attendance', ['tid' => $tid, 'date' => $date, 'students' => $students]);
    }

    public function storeAttendance(Request $request, $tid)
    {
        // Process the attendance data
        foreach ($request->except('_token') as $studentId => $attendanceStatus) {
            // Assuming 'StudentTeacher' model represents the attendance records
            $attendanceRecord = new StudentTeacher();
            $attendanceRecord->student_id = $studentId;
            $attendanceRecord->teacher_id = $tid;
            $attendanceRecord->attendance_status = $attendanceStatus;
            $attendanceRecord->save();
        }

        // Redirect or return a response
        return redirect(route('teacher-home', ['tid' => $tid]))->with('success', 'Attendance recorded successfully!');
    }


    public function viewSessions($tid)
    {
        $sessions = DB::table('student_teacher')
            ->select('created_at')
            ->distinct()
            ->where('teacher_id', $tid)
            ->get();
        return view('teachers.view-sessions', ['tid' => $tid, 'sessions' => $sessions]);
    }

    public function viewIndividualSession($tid, $createdAt)
    {
        $students = StudentTeacher::join('students', 'student_teacher.student_id', '=', 'students.id')
            ->select('students.id', 'students.name', 'student_teacher.attendance_status')
            ->where('student_teacher.teacher_id', $tid)
            ->where('student_teacher.created_at', $createdAt)
            ->get();

        $student_attendance_statuses = [];
        foreach ($students as $student) {
            if ($student->attendance_status == "present")
                $student_attendance_statuses[] = 'selected';
            else
                $student_attendance_statuses[] = '';
        }

        return view('teachers.view-individual-session', ['tid' => $tid,
                                                        'createdAt' => $createdAt,
                                                        'students' => $students,
                                                        'student_attendance_statuses' => $student_attendance_statuses]);
    }

    public  function updateAttendance($tid, $startTime, Request $request)
    {
        foreach ($request->except('_token', '_method') as $studentId => $attendanceStatus) {
            StudentTeacher::where('student_id', $studentId)
                ->where('teacher_id', $tid)
                ->where('created_at', $startTime)
                ->update(['attendance_status' => $attendanceStatus]);
        }
        return redirect(route('view-sessions', ['tid' => $tid]))->with('success', 'Attendance updated successfully!');
    }
}
