<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailCourse;
use Illuminate\Http\Request;

class DetailCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DetailCourse::orderBy('id')->get();
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
        $dataDetailCourse = new DetailCourse();
        $dataDetailCourse->title = $request->title;
        $dataDetailCourse->description = $request->description;
        $dataDetailCourse->difficulty = $request->difficulty;
        $dataDetailCourse->category = $request->category;
        $dataDetailCourse->course_curicullum = $request->course_curicullum;
        $dataDetailCourse->course_description = $request->course_description;

        $post = $dataDetailCourse->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataDetailCourse
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DetailCourse::find($id);
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
        $dataDetailCourse = DetailCourse::find($id);
        if (!$dataDetailCourse) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $dataDetailCourse = DetailCourse::find($id);
        $dataDetailCourse->title = $request->title;
        $dataDetailCourse->description = $request->description;
        $dataDetailCourse->difficulty = $request->difficulty;
        $dataDetailCourse->category = $request->category;
        $dataDetailCourse->course_curicullum = json_decode($request->course_curicullum);
        $dataDetailCourse->course_description = json_decode($request->course_description);

        $post = $dataDetailCourse->save();

        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataDetailCourse
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataDetailCourse = DetailCourse::find($id);
        if (empty($dataDetailCourse)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataDetailCourse->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
