<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailCourse;
use Illuminate\Http\Request;

class DetailCourseController extends Controller
{
    public function index(){
        $detailCourse = DetailCourse::with('options')->get();
        return response()->json($detailCourse);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'difficulty' => 'required|string',
            'category' => 'required|string',
            'options' => 'required|array|min:4',
            'options.*.course_curicullum' => 'required|string',
            'options.*.course_description' => 'required|string'
        ]);

        $detail = DetailCourse::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'difficulty' => $validatedData['difficulty'],
            'category' => $validatedData['category']
        ]);

        foreach ($validatedData['options'] as $option) {
            $detail->options()->create([
                'course_curicullum' => $option['course_curicullum'],
                'course_description' => $option['course_description']
            ]);
        }

        return response()->json($detail, 201);
    }

    public function show(DetailCourse $detailCourse)
    {
        $detailCourse = DetailCourse::with('options')->get();
        return response()->json($detailCourse);
    }
}
