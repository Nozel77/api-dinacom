<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDescription extends Model
{
    use HasFactory;
    protected $table = 'course_descriptions';
    protected $fillable = ['course_description_1', 'course_description_2', 'course_description_3', 'course_description_4' ];

    public function curicullum(){
        return $this->hasMany(CourseCuricullum::class, 'course_curicullum');
    }
}
