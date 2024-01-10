<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Internship::orderBy('id')->get();
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
        $dataInternship = new Internship();
        $dataInternship->company_name = $request->company_name;
        $dataInternship->company_name = $request->position;
        $dataInternship->company_name = $request->company_image;
        $dataInternship->company_name = $request->batch;

        $post = $dataInternship->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataInternship
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Internship::find($id);
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
        $dataInternship = Internship::find($id);
        $dataInternship->company_name = $request->company_name;
        $dataInternship->company_name = $request->position;
        $dataInternship->company_name = $request->company_image;
        $dataInternship->company_name = $request->batch;

        $post = $dataInternship->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataInternship
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataInternship = Internship::find($id);
        if (empty($dataInternship)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataInternship->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
