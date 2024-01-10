<?php

use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', function () {
    $userId = request('id'); 
    $courseId = request('course_id');

    if ($userId) {
        $user = User::find($userId);
        $course = [$courseId];
        
        if ($user) {
            $user->course()->attach($course);
            echo "Record for user with ID $userId has been created successfully.";
        } else {
            echo "User with ID $userId not found.";
        }
    } else {
        echo "No user ID provided.";
    }
});