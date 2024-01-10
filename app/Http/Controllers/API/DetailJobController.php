<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailJob;
use Illuminate\Http\Request;

class DetailJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DetailJob::orderBy('id')->get();
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
        $dataDetailJob = new DetailJob();
        $dataDetailJob->company_name = $request->company_name;
        $dataDetailJob->jobdesk = $request->jobdesk;
        $dataDetailJob->location = $request->location;
        $dataDetailJob->type_job = $request->type_job;
        $dataDetailJob->company_image = $request->company_image;
        $dataDetailJob->jobdesk_description = $request->jobdesk_description;
        $dataDetailJob->jobdesk_requirement = $request->jobdesk_requirement;

        $post = $dataDetailJob->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataDetailJob
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DetailJob::find($id);
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
        $dataDetailJob = DetailJob::find($id);
        if (!$dataDetailJob) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $dataDetailJob = DetailJob::find($id);
        $dataDetailJob->company_name = $request->company_name;
        $dataDetailJob->jobdesk = $request->jobdesk;
        $dataDetailJob->location = $request->location;
        $dataDetailJob->type_job = $request->type_job;
        $dataDetailJob->company_image = $request->company_image;
        $dataDetailJob->jobdesk_description = json_decode($request->jobdesk_description);
        $dataDetailJob->jobdesk_requirement = json_decode($request->jobdesk_requirement);

        $post = $dataDetailJob->save();

        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataDetailJob
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataDetailJob = DetailJob::find($id);
        if (empty($dataDetailJob)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataDetailJob->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
