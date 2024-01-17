<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseEnrollController extends Controller
{
    public function index()
    {
        $data = CourseEnroll::all();
        return response()->json([
            'status' => 'success',
            'message' => 'data succcesfully loaded',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'introduction_file' => 'required|mimes:pdf|max:12048',
            'about_file' => 'required|mimes:pdf|max:12048',
            'content_file' => 'required|mimes:pdf|max:12048',
            'closing_file' => 'required|mimes:pdf|max:12048',
            'assessment_file' => 'required|mimes:pdf|max:12048',
        ]);

        $enrollCourse = new CourseEnroll();

        $enrollCourse->introduction_file = $request->file('introduction_file')->store('enroll_course', 'public');
        $enrollCourse->about_file = $request->file('about_file')->store('enroll_course', 'public');
        $enrollCourse->content_file = $request->file('content_file')->store('enroll_course', 'public');
        $enrollCourse->closing_file = $request->file('closing_file')->store('enroll_course', 'public');
        $enrollCourse->assessment_file = $request->file('assessment_file')->store('enroll_course', 'public');

        $enrollCourse->save();

        return response()->json(['message' => 'PDF files uploaded successfully'], 201);
    }
}
