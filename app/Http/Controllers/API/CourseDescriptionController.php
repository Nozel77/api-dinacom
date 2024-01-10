<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseDescription;
use Illuminate\Http\Request;

class CourseDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CourseDescription::orderBy('id')->get();
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
        $dataCourseDescription = new CourseDescription();
        $dataCourseDescription->course_description_1 = $request->course_description_1;
        $dataCourseDescription->course_description_2 = $request->course_description_2;
        $dataCourseDescription->course_description_3 = $request->course_description_3;
        $dataCourseDescription->course_description_4 = $request->course_description_4;

        $post = $dataCourseDescription->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataCourseDescription
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $data = CourseDescription::find($id);
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
        $dataCourseDescription = CourseDescription::find($id);
        $dataCourseDescription->course_description_1 = $request->course_description_1;
        $dataCourseDescription->course_description_2 = $request->course_description_2;
        $dataCourseDescription->course_description_3 = $request->course_description_3;
        $dataCourseDescription->course_description_4 = $request->course_description_4;

        $post = $dataCourseDescription->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataCourseDescription
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataCourseDescription = CourseDescription::find($id);
        if (empty($dataCourseDescription)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataCourseDescription->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
