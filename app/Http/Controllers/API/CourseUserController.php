<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function add()
    {
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
    }

    public function update()
    {
        $userId = request('id'); 
        $courseId = request('course_id');

        if ($userId) {
            $user = User::find($userId);
            $course = [$courseId];
            
            if ($user) {
                $user->course()->sync($course);
                echo "update for user with ID $userId has been created successfully.";
            } else {
                echo "User with ID $userId not found.";
            }
        } else {
            echo "No user ID provided.";
        }
    }
    public function delete()
    {
        $userId = request('id'); 
        $courseId = request('course_id');

        if ($userId) {
            $user = User::find($userId);
            $course = [$courseId];
            
            if ($user) {
                $user->course()->detach($course);
                echo "delete for user with ID $userId has been created successfully.";
            } else {
                echo "User with ID $userId not found.";
            }
        } else {
            echo "No user ID provided.";
        }
    }
}
