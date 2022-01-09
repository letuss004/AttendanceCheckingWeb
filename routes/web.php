<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\StudentController;
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


Route::get('/lessons/{course_id}', [LessonController::class, 'index'])->name('lessons');
Route::get('/lesson/show/{lesson_id}', [LessonController::class, 'show'])->name('lesson.show');
Route::post('/lesson/store', [LessonController::class, 'store'])->name('lesson.store');
Route::post('/lesson/update/', [LessonController::class, 'update'])->name('lesson.update');
Route::post('/lesson/destroy/', [LessonController::class, 'destroy'])->name('lesson.destroy');


Route::get('/attendances/course/{course_id}', [AttendanceController::class, 'index'])->name('course.attendance');
Route::get('/attendances/show/{attendance_id}', [AttendanceController::class, 'show'])->name('course.show');


Route::post('/qr/generate', [QrController::class, 'create'])->name('qr.create');
Route::post('/qr/close/', [QrController::class, 'update'])->name('qr.close');
Route::post('/qr/edit/', [QrController::class, 'edit'])->name('qr.edit');
Route::post('/qr/destroy/', [QrController::class, 'destroy'])->name('qr.destroy');


Route::post('/admin/lessons/{course_id}', [LessonController::class, 'index'])->name('admin.lessons.index');
Route::post('/admin/register/{course_id}', [AdminController::class, 'store'])->name('');
Route::post('/admin/register/{course_id}', [AdminController::class, 'store'])->name('');


Route::post('/student/attendance/{lesson_id}', [StudentController::class, 'store'])->name('student.create');
Route::get('/student/test', [StudentController::class, 'index'])->name('test');

