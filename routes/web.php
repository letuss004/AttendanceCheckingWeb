<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\StudentController;
use App\Models\Attendance;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/attendance/test', [AttendanceController::class, 'create']);

Route::get('/lessons/{course_id}', [LessonController::class, 'index'])->name('lessons');
Route::get('/lesson/show/{lesson_id}', [LessonController::class, 'show'])->name('lesson.show');
Route::get('/lesson/create/{course_id}', [LessonController::class, 'create'])->name('lesson.create');
Route::post('/lesson/store', [LessonController::class, 'store'])->name('lesson.store');
Route::get('/lesson/edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit');
Route::get('/lesson/delete/{id}', [LessonController::class, 'destroy'])->name('lesson.destroy');


Route::get('/qr/generate/{lesson_id}', [QrController::class, 'index'])->name('qr.home');


Route::post('/admin/register/{course_id}', [AdminController::class, 'store'])->name('admin.course.store');


Route::post('/student/attendance/{lesson_id}', [StudentController::class, 'store'])->name('student.create');
Route::get('/student/test', [StudentController::class, 'index'])->name('test');



