<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCourse extends Model
{
    use HasFactory;
    protected $table = 'detail_course';   
    protected $casts = [
        'course_curicullum' => 'array',
        'course_description' => 'array',
    ];
}
