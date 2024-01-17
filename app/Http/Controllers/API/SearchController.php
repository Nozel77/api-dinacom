<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\Internship;
use App\Models\ListJob;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchCourse(Request $request){
        $title = $request->input('search'); 
    
        $result = Course::where("title", "like", "%".$title."%")->get();
        
        if ($result->count() > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Course successfully loaded',
                'data' => $result    
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Course not found',   
            ], 404);
        }
    }

    public function searchArticle(Request $request){
        $title = $request->input('search');
    
        $result = Article::where("title", "like", "%".$title."%")->get();
        
        if ($result->count() > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Article successfully loaded',
                'data' => $result    
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Article not found',   
            ], 404);
        }
    }

    public function searchInternship(Request $request){
        $position = $request->input('search');
    
        $result = Article::where("position", "like", "%".$position."%")->get();
        
        if ($result->count() > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Internship successfully loaded',
                'data' => $result    
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Internship not found',   
            ], 404);
        }
    }

    public function searchJob(Request $request){
        $searchTerm = $request->input('search');
    
        $result = ListJob::where(function ($query) use ($searchTerm) {
            $query->where("jobdesk", "like", "%".$searchTerm."%")
                  ->orWhere("company_name", "like", "%".$searchTerm."%");
        })->get();
    
        if ($result->count() > 0) {
            return response()->json([
                'status' => true,
                'message' => 'Job successfully loaded',
                'data' => $result    
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Job not found',   
            ], 404);
        }
    }

    
    
    
}
