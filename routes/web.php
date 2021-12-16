<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
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


Route::get('/lessons/{course_id}', [LessonController::class, 'index'])->name('lessons');
Route::get('/lesson/create/{course_id}', [LessonController::class, 'create'])->name('lesson.create');
Route::post('/lesson/store', [LessonController::class, 'store'])->name('lesson.store');
Route::get('/lesson/edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit');
Route::get('/lesson/delete/{id}', [LessonController::class, 'destroy'])->name('lesson.destroy');


Route::post('/student/register/{course_id}', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/register/{course_id}', [StudentController::class, 'create'])->name('student.create');


