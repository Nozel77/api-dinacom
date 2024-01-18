<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCourseOption extends Model
{
    use HasFactory;
    protected $table = 'detail_course_options';
    protected $fillable = ['detail_course_id', 'course_curicullum', 'course_description'];
    public $timestamps = false;
}
