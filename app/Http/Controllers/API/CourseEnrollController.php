<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;

class CourseEnrollController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf|max:10240', 
        ]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $path = $file->storeAs('pdf_files', $nama_file, 'public');

        $courseEnroll = new CourseEnroll();
        $courseEnroll->introduction_file = $nama_file;
        $courseEnroll->save();

        return response()->json(['message' => 'File PDF berhasil diunggah'], 200);
    }
}
