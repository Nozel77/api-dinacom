<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailInternship;
use Illuminate\Http\Request;

class DetailInternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DetailInternship::orderBy('id')->get();
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
        $dataDetailInternship = new DetailInternship();
        $dataDetailInternship->title = $request->title;
        $dataDetailInternship->category = $request->category;
        $dataDetailInternship->description = $request->description;
        $dataDetailInternship->image_company = $request->image_company;
        $dataDetailInternship->image_banner = $request->image_banner;

        $post = $dataDetailInternship->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataDetailInternship
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DetailInternship::find($id);
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
        $dataDetailInternship = DetailInternship::find($id);
        if (!$dataDetailInternship) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $dataDetailInternship->title = $request->title;
        $dataDetailInternship->category = $request->category;
        $dataDetailInternship->description = $request->description;
        $dataDetailInternship->image_company = $request->image_company;
        $dataDetailInternship->image_banner = $request->image_banner;

        $dataDetailInternship->save();
        return response()->json([
            'status' => true,
            'message' => 'data successfully updated',
            'data' => $dataDetailInternship
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataDetailInternship = DetailInternship::find($id);
        if (empty($dataDetailInternship)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataDetailInternship->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
