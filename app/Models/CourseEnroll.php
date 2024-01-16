<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEnroll extends Model
{
    use HasFactory;
    protected $table = 'course_enroll';
    protected $fillable = ['introduction_file'];
}

//, 'about_file', 'explanation_file', 'closing_file', 'assessment_file'