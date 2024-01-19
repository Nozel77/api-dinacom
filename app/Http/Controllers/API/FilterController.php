<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ListJob;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function jobPopular(){
        $result = ListJob::orderBy('created_at', 'desc')->take(10)->get();
        return response()->json([
            'status' => true,
            'message' => 'Job successfully loaded',
            'data' => $result    
        ], 200);
       }

       public function maxSallary(){
        $result = ListJob::orderBy('sallary_max', 'desc')->take(10)->get();
        return response()->json([
            'status' => true,
            'message' => 'Job successfully loaded',
            'data' => $result    
        ], 200);
       }

    public function typeJob(Request $request)
    {
        $typeJob = $request->input('type_job');

        $query = ListJob::query();

        $query->where(function ($query) use ($typeJob){
            if ($typeJob) {
                $query->where("type_job", "like", "%".$typeJob."%");
            }
        });

        $result = $query->get();

        if ($result->count() > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Type Job successfully loaded',
                'data' => $result    
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Type Job not found',   
            ], 404);
        }
    }

    public function position(Request $request){
        $position = $request->input('position');

        $query = ListJob::query();

        $query->where(function ($query) use ($position){
            if ($position) {
                $query->where("position", "like", "%".$position."%");
            }
        });

        $result = $query->get();

        if ($result->count() > 0) {
            return response()->json([
                'status' => true,
                'message' => 'position successfully loaded',
                'data' => $result    
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'position not found',   
            ], 404);
        }
    }

}
