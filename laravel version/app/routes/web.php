<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'verify'])->name('verify');

Route::get('/student/{sid}', [StudentController::class, 'index'])->name('student-home');
Route::get('/student/{sid}/{cid}', [StudentController::class, 'details'])->name('details');


Route::get('/teacher/{tid}', [TeacherController::class, 'indexTeacher'])->name('teacher-home');

Route::get('/teacher/{tid}/take', [TeacherController::class, 'takeAttendance'])->name('take-attendance');
Route::post('/teacher/{tid}/take', [TeacherController::class, 'storeAttendance'])->name('store-attendance');

Route::get('/teacher/{tid}/view', [TeacherController::class, 'viewSessions'])->name('view-sessions');
Route::get('/teacher/{tid}/view/{startTime}', [TeacherController::class, 'viewIndividualSession'])->name('view-individual-session');
Route::put('/teacher/{tid}/view/{startTime}', [TeacherController::class, 'updateAttendance'])->name('update-attendance');

