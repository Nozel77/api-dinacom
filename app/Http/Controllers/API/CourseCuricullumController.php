<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseCuricullum;
use Illuminate\Http\Request;

class CourseCuricullumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CourseCuricullum::orderBy('id')->get();
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
        $dataCourseCuricullum = new CourseCuricullum();
        $dataCourseCuricullum->course_curicullum_1 = $request->course_curicullum_1;
        $dataCourseCuricullum->course_curicullum_2 = $request->course_curicullum_2;
        $dataCourseCuricullum->course_curicullum_3 = $request->course_curicullum_3;
        $dataCourseCuricullum->course_curicullum_4 = $request->course_curicullum_4;

        $post = $dataCourseCuricullum->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataCourseCuricullum
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = CourseCuricullum::find($id);
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
        $dataCourseCuricullum = CourseCuricullum::find($id);
        $dataCourseCuricullum->course_curicullum_1 = $request->course_curicullum_1;
        $dataCourseCuricullum->course_curicullum_2 = $request->course_curicullum_2;
        $dataCourseCuricullum->course_curicullum_3 = $request->course_curicullum_3;
        $dataCourseCuricullum->course_curicullum_4 = $request->course_curicullum_4;

        $post = $dataCourseCuricullum->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataCourseCuricullum
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataCourseCuricullum = CourseCuricullum::find($id);
        if (empty($dataCourseCuricullum)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataCourseCuricullum->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
