<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\CourseCuricullumController;
use App\Http\Controllers\API\CourseDescriptionController;
use App\Http\Controllers\API\CourseEnrollController;
use App\Http\Controllers\API\CourseUserController;
use App\Http\Controllers\API\CuricullumDescriptionController;
use App\Http\Controllers\API\DetailCourseController;
use App\Http\Controllers\API\DetailInternshipController;
use App\Http\Controllers\API\DetailJobController;
use App\Http\Controllers\API\FilterController;
use App\Http\Controllers\API\InternshipController;
use App\Http\Controllers\API\InternshipUserController;
use App\Http\Controllers\API\JobController;
use App\Http\Controllers\API\SearchController;
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
Route::get(' job/detail', [DetailJobController::class, 'index']); 
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

//route detail course
Route::post('course/detail', [DetailCourseController::class, 'store']);
Route::get('course/detail/{detailCourse}', [DetailCourseController::class, 'show']);

//route detail course after enroll
Route::get('/enroll-course', [CourseEnrollController::class, 'index']);
Route::post('/enroll-course', [CourseEnrollController::class, 'store']);
Route::put('/enroll-course/{id}', [CourseEnrollController::class, 'update']);


//route course-user
Route::get('course-user/{user_id}', [CourseUserController::class, 'show']);
Route::post('course-user/add', [CourseUserController::class, 'add']);
Route::post('course-user/update', [CourseUserController::class, 'update']);
Route::post('course-user/delete', [CourseUserController::class, 'delete']);

//route internship
Route::get('internship', [InternshipController::class, 'index']);
Route::post('internship', [InternshipController::class, 'store']);
Route::get('internship/{id}', [InternshipController::class, 'show']);
Route::put('internship/{id}', [InternshipController::class, 'update']);
Route::delete('internship/{id}', [InternshipController::class, 'destroy']);

//route detail internship
Route::get('internship/detail', [DetailInternshipController::class, 'index']);
Route::post('internship/detail', [DetailInternshipController::class, 'store']);
Route::get('internship/detail/{id}', [DetailInternshipController::class, 'show']);
Route::put('internship/detail/{id}', [DetailInternshipController::class, 'update']);
Route::delete('internship/detail/{id}', [DetailInternshipController::class, 'destroy']);

//route internship-user
Route::get('internship-user/{user_id}', [InternshipUserController::class, 'show']);
Route::post('internship-user/add', [InternshipUserController::class, 'add']);
Route::post('internship-user/update', [InternshipUserController::class, 'update']);
Route::post('internship-user/delete', [InternshipUserController::class, 'delete']);

//route list article 
Route::get('article', [ArticleController::class, 'index']);
Route::post('article', [ArticleController::class, 'store']);
Route::get('article/{id}', [ArticleController::class, 'show']);
Route::put('article/{id}', [ArticleController::class, 'update']);
Route::delete('article/{id}', [ArticleController::class, 'destroy']);

//route search 
Route::get('search/course', [SearchController::class, 'searchCourse']);
Route::get('search/article', [SearchController::class, 'searchArticle']);
Route::get('search/internship', [SearchController::class, 'searchInternship']);
Route::get('search/job', [SearchController::class, 'searchJob']);

//route filtering
Route::get('filter/job-popular', [FilterController::class, 'jobPopular']);
Route::get('filter/max-sallary', [FilterController::class, 'maxSallary']);
Route::get('filter/type-job', [FilterController::class, 'typeJob']);
Route::get('filter/position', [FilterController::class, 'position']);


