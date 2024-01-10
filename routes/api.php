<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\CourseCuricullumController;
use App\Http\Controllers\API\CourseDescriptionController;
use App\Http\Controllers\API\CourseUserController;
use App\Http\Controllers\API\DetailJobController;
use App\Http\Controllers\API\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//route auth
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router)
 {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('get-user', [AuthController::class, 'me']);
    Route::post('get-user/{id}', [AuthController::class, 'update']);
});

//route job
Route::get('job', [JobController::class, 'index']);
Route::post('job', [JobController::class, 'store']); 
Route::get('job/{id}', [JobController::class, 'show']);
Route::put('job/{id}', [JobController::class, 'update']);
Route::delete('job/{id}', [JobController::class, 'delete']);

//route detail job
Route::get('job/detail', [DetailJobController::class, 'index']); 
Route::get('job/detail/{id}', [DetailJobController::class, 'show']); 
Route::post('job/detail', [DetailJobController::class, 'store']); 
Route::put('job/detail/{id}', [DetailJobController::class, 'update']); 
Route::delete('job/detail/{id}', [DetailJobController::class, 'destroy']); 

//route course
Route::get('course', [CourseController::class, 'index']);
Route::post('course', [CourseController::class, 'store']);
Route::get('course/{id}', [CourseController::class, 'show']);
Route::put('course/{id}', [CourseController::class, 'update']);
Route::delete('course/{id}', [CourseController::class, 'destroy']);

//route course-user
Route::post('course-user/add', [CourseUserController::class, 'add']);
Route::post('course-user/update', [CourseUserController::class, 'update']);
Route::post('course-user/delete', [CourseUserController::class, 'delete']);

//route course-curriculum 
Route::get('course-curicullum', [CourseCuricullumController::class, 'index']);
Route::post('course-curicullum', [CourseCuricullumController::class, 'store']);
Route::get('course-curicullum/{id}', [CourseCuricullumController::class, 'show']);
Route::put('course-curicullum/{id}', [CourseCuricullumController::class, 'update']);
Route::delete('course-curicullum', [CourseCuricullumController::class, 'destroy']);

//route course-description
Route::get('course-description', [CourseDescriptionController::class, 'index']);
Route::post('course-description', [CourseDescriptionController::class, 'store']);
Route::get('course-description/{id}', [CourseDescriptionController::class, 'show']);
Route::put('course-description/{id}', [CourseDescriptionController::class, 'update']);
Route::delete('course-curriculum', [CourseDescriptionController::class, 'destroy']);