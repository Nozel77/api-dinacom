<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ListJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ListJob::orderBy('id')->get();
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
        $dataListJob = new ListJob();
        $dataListJob->company_name = $request->company_name;
        $dataListJob->jobdesk = $request->jobdesk;
        $dataListJob->location = $request->location;
        $dataListJob->type_job = $request->type_job;
        $dataListJob->company_image = $request->company_image;

        $post = $dataListJob->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataListJob
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ListJob::find($id);
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
        $dataListJob = ListJob::find($id);
        $dataListJob->company_name = $request->company_name;
        $dataListJob->jobdesk = $request->jobdesk;
        $dataListJob->location = $request->location;
        $dataListJob->type_job = $request->type_job;
        $dataListJob->company_image = $request->company_image;

        $post = $dataListJob->save();

        return response()->json([
            'status' => true,
            'message' => 'data updated',
            'data' => $dataListJob
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataListJob = ListJob::find($id);
        if (empty($dataListJob)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataListJob->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
