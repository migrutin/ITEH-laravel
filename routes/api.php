<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use  App\Http\Controllers\StudentController;
use  App\Http\Controllers\ExamController;
use  App\Http\Controllers\StudentExamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::delete('exams/{id}/delete', [ExamController::class, 'destroy']);
    Route::post('exams/create', [ExamController::class, 'create']);
    Route::put('exams/name/{id}/edit', [ExamController::class, 'editName']);
        
    Route::post('/logout', [AuthController::class, 'logout']);
});

//Rute koje ne zahtevaju autentifikaciju
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::get('students', [StudentController::class, 'index']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::get('exams', [ExamController::class, 'index']);
Route::get('studentexams', [StudentExamController::class, 'index']);
Route::get('studentexams/{id}', [StudentExamController::class, 'showExams']);