<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseEnroll;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class CourseEnrollController extends Controller
{
    public function index()
    {
        $courseEnroll = CourseEnroll::take(10)->get();

        if ($courseEnroll->isEmpty()) {
            return response()->json(['error' => 'No training materials found'], 404);
        }

        $response = [];

        foreach ($courseEnroll as $courseEnrolls) {
            $response[] = [
                'training_materials' => [
                    'id' => $courseEnrolls->id,
                    'introduction' => [
                        'title' => $courseEnrolls->introduction_title,
                        'file' => $courseEnrolls->introduction_file,
                        'status_progress' => $courseEnrolls->introduction_status_progress,
                    ],
                    'about' => [
                        'title' => $courseEnrolls->about_title,
                        'file' => $courseEnrolls->about_file,
                        'status_progress' => $courseEnrolls->about_status_progress,
                    ],
                    'content' => [
                        'title' => $courseEnrolls->content_title,
                        'file' => $courseEnrolls->content_file,
                        'status_progress' => $courseEnrolls->content_status_progress,
                    ],
                    'closing' => [
                        'title' => $courseEnrolls->closing_title,
                        'file' => $courseEnrolls->closing_file,
                        'status' => $courseEnrolls->closing_status,
                    ],
                ],
                'last_assignments' => [
                    'question' => '', 
                ],
            ];
        }

        return response()->json($response);
    }

    public function store(Request $request)
{
    $request->validate([
        'course_enroll' => 'required|array',
        'course_enroll.introduction.title' => 'required|string',
        'course_enroll.introduction.file' => 'required|file|mimes:pdf,doc,docx,txt',
        'course_enroll.introduction.status_progress' => 'required|in:done,ongoing,lock',
        'course_enroll.about.title' => 'required|string',
        'course_enroll.about.file' => 'required|file|mimes:pdf,doc,docx,txt',
        'course_enroll.about.status_progress' => 'required|in:done,ongoing,lock',
        'course_enroll.content.title' => 'required|string',
        'course_enroll.content.file' => 'required|file|mimes:pdf,doc,docx,txt',
        'course_enroll.content.status_progress' => 'required|in:done,ongoing,lock',
        'course_enroll.closing.title' => 'required|string',
        'course_enroll.closing.file' => 'required|file|mimes:pdf,doc,docx,txt',
        'course_enroll.closing.status' => 'required|in:done,ongoing,lock',
        'course_enroll.last_assignments.question' => 'required|string',
    ]);

    $introductionFile = $request->file('course_enroll.introduction.file');
    $introductionFilePath = $introductionFile->store('public/files');

    $aboutFile = $request->file('course_enroll.about.file');
    $aboutFilePath = $aboutFile->store('public/files');

    $contentFile = $request->file('course_enroll.content.file');
    $contentFilePath = $contentFile->store('public/files');

    $closingFile = $request->file('course_enroll.closing.file');
    $closingFilePath = $closingFile->store('public/files');

    $trainingMaterial = CourseEnroll::create([
        'introduction_title' => $request->input('course_enroll.introduction.title'),
        'introduction_file' => $introductionFilePath,
        'introduction_status_progress' => $request->input('course_enroll.introduction.status_progress'),
        'about_title' => $request->input('course_enroll.about.title'),
        'about_file' => $aboutFilePath,
        'about_status_progress' => $request->input('course_enroll.about.status_progress'),
        'content_title' => $request->input('course_enroll.content.title'),
        'content_file' => $contentFilePath,
        'content_status_progress' => $request->input('course_enroll.content.status_progress'),
        'closing_title' => $request->input('course_enroll.closing.title'),
        'closing_file' => $closingFilePath,
        'closing_status' => $request->input('course_enroll.closing.status'),
        'question' => $request->input('course_enroll.last_assignments.question'),
    ]);

    $response = [
        'course_enroll' => [
            'introduction' => [
                'title' => $trainingMaterial->introduction_title,
                'file' => $trainingMaterial->introduction_file,
                'status_progress' => $trainingMaterial->introduction_status_progress,
            ],
            'about' => [
                'title' => $trainingMaterial->about_title,
                'file' => $trainingMaterial->about_file,
                'status_progress' => $trainingMaterial->about_status_progress,
            ],
            'content' => [
                'title' => $trainingMaterial->content_title,
                'file' => $trainingMaterial->content_file,
                'status_progress' => $trainingMaterial->content_status_progress,
            ],
            'closing' => [
                'title' => $trainingMaterial->closing_title,
                'file' => $trainingMaterial->closing_file,
                'status' => $trainingMaterial->closing_status,
            ],
        ],
        'last_assignments' => [
            'question' => $trainingMaterial->question,
        ],
        'message' => 'Training material created successfully',
    ];

    return response()->json($response, 201);
}

public function update(Request $request, $id)
{
    $request->validate([
        'course_enroll' => 'required|array',
        'course_enroll.introduction.status_progress' => 'required|in:done,ongoing,lock',
        'course_enroll.about.status_progress' => 'required|in:done,ongoing,lock',
        'course_enroll.content.status_progress' => 'required|in:done,ongoing,lock',
        'course_enroll.closing.status' => 'required|in:done,ongoing,lock',
    ]);

    $trainingMaterial = CourseEnroll::findOrFail($id);

    $trainingMaterial->update([
        'introduction_status_progress' => $request->input('course_enroll.introduction.status_progress'),
        'about_status_progress' => $request->input('course_enroll.about.status_progress'),
        'content_status_progress' => $request->input('course_enroll.content.status_progress'),
        'closing_status' => $request->input('course_enroll.closing.status'),
    ]);

    $response = [
        'course_enroll' => [
            'introduction' => [
                'status_progress' => $trainingMaterial->introduction_status_progress,
            ],
            'about' => [
                'status_progress' => $trainingMaterial->about_status_progress,
            ],
            'content' => [
                'status_progress' => $trainingMaterial->content_status_progress,
            ],
            'closing' => [
                'status' => $trainingMaterial->closing_status,
            ],
        ],
        'message' => 'Status progress updated successfully',
    ];

    return response()->json($response, 200);
}




}




