<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/auth/login', [LoginController::class, 'studentLogin']);
Route::get('/attendance/test', [AttendanceController::class, 'create']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [LogoutController::class, 'logout']);
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


