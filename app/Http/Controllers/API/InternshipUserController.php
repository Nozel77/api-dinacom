<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\InternshipUser;
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

    public function show(string $user_id){
        $data = InternshipUser::where('user_id', $user_id)->get();
    
        if ($data->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found'
            ], 404);
        }
    
        $internshipIds = $data->pluck('internship_id')->toArray();
    
        return response()->json([
            'status' => true,
            'message' => 'Data successfully loaded',
            'data' => [
                'user_id' => $user_id,
                'internship_id' => $internshipIds
            ]
        ], 200);
    }
}
