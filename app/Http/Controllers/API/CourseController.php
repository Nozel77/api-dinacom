<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Course::orderBy('id')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'data succcesfully loaded',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCourse = new Course();
        $dataCourse->image_course = $request->image_course;
        $dataCourse->title = $request->title;
        $dataCourse->description = $request->description;
        $dataCourse->percentage = $request->percentage;
        $dataCourse->difficulty = $request->difficulty;
        $dataCourse->category = $request->category;

        $post = $dataCourse->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataCourse
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Course::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data successfully loaded',
                'data' => $data    
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataCourse = Course::find($id);
        $dataCourse->image_course = $request->image_course;
        $dataCourse->title = $request->title;
        $dataCourse->description = $request->description;
        $dataCourse->percentage = $request->percentage;
        $dataCourse->difficulty = $request->difficulty;
        $dataCourse->category = $request->category;

        $post = $dataCourse->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataCourse
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataCourse = Course::find($id);
        if (empty($dataCourse)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataCourse->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
