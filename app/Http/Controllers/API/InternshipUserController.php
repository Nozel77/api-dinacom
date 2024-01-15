<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InternshipUserController extends Controller
{
    public function add(){
        $userId = request('id');
        $internshipId = request('internship_id');

        if ($userId) {
            $user = User::find($userId);
            $internship = [$internshipId];

            if ($user) {
                $user->internship()->attach($internship);
                echo "Record for user with ID $userId has been created successfully.";
            } else {
                echo "User with ID $userId not found.";
            }
        } else {
            echo "No user ID provided.";
        }
    }

    public function update(){
        $userId = request('id');
        $internshipId = request('internship_id');

        if ($userId) {
            $user = User::find($userId);
            $internship = [$internshipId];

            if ($user) {
                $user->internship()->sync($internship);
                echo "update for user with ID $userId has been created successfully.";
            } else {
                echo "User with ID $userId not found.";
            }
        } else {
            echo "No user ID provided.";
        }
    }

    public function delete(){
        $userId = request('id');
        $internshipId = request('internship_id');

        if ($userId) {
            $user = User::find($userId);
            $internship = [$internshipId];

            if ($user) {
                $user->internship()->detach($internship);
                echo "delete for user with ID $userId has been created successfully.";
            } else {
                echo "User with ID $userId not found.";
            }
        } else {
            echo "No user ID provided.";
        }
    }
}
