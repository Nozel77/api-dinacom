<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEnroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'introduction_title',
        'introduction_file',
        'introduction_status_progress',
        'about_title',
        'about_file',
        'about_status_progress',
        'content_title',
        'content_file',
        'content_status_progress',
        'closing_title',
        'closing_file',
        'closing_status',
        'question'
    ];
}
