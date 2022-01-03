<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
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


Route::get('/attendance/test', [AttendanceController::class, 'create']);


Route::get('/lessons/{course_id}', [LessonController::class, 'index'])->name('lessons');
Route::get('/lesson/show/{lesson_id}', [LessonController::class, 'show'])->name('lesson.show');
Route::post('/lesson/store', [LessonController::class, 'store'])->name('lesson.store');
Route::post('/lesson/update/', [LessonController::class, 'update'])->name('lesson.update');
Route::post('/lesson/destroy/', [LessonController::class, 'destroy'])->name('lesson.destroy');


Route::post('/qr/generate', [QrController::class, 'create'])->name('qr.create');
Route::post('/qr/close/', [QrController::class, 'update'])->name('qr.close');


Route::post('/admin/register/{course_id}', [AdminController::class, 'store'])->name('admin.course.store');


Route::post('/student/attendance/{lesson_id}', [StudentController::class, 'store'])->name('student.create');
Route::get('/student/test', [StudentController::class, 'index'])->name('test');



