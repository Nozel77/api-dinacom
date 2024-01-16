<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Article::all();
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
        $dataArticle = new Article();
        $dataArticle->image = $request->image;
        $dataArticle->title = $request->title;
        $dataArticle->content = $request->content;
        $dataArticle->category = $request->category;

        $post = $dataArticle->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataArticle
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Article::find($id);
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
        $dataArticle = Article::find($id);
        $dataArticle->image = $request->image;
        $dataArticle->title = $request->title;
        $dataArticle->content = $request->content;
        $dataArticle->category = $request->category;

        $post = $dataArticle->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataArticle
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataArticle = Article::find($id);
        if (empty($dataArticle)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataArticle->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
