<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function verify(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');

        if ($role === 'teacher') {
            $teacher = Teacher::where('email', $email)->first();

            if ($teacher && $password === $teacher->password) {
                return redirect()->route('teacher-home', ['tid' => $teacher->tid]);
            } else {
                return "Incorrect email or password for teacher";
            }
        } elseif ($role === 'student') {
            $student = Student::where('email', $email)->first();
            echo $student;

            if ($student && $password === $student->password) {
                return redirect()->route('student-home', ['sid' => $student->id]);
            } else {
                return "Incorrect email or password for student";
            }
        } else {
            return "Invalid role";
        }
    }
}
