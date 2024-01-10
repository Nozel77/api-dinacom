<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCuricullum extends Model
{
    use HasFactory;
    protected $table = 'course_curicullum';
    protected $fillable = ['course_curicullum_1', 'course_curicullum_2', 'course_curicullum_3', 'course_curicullum_4',];
}
