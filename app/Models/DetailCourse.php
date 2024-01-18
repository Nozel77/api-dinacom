<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCourse extends Model
{
    use HasFactory;
    protected $table = 'detail_course';
    protected $fillable = ['title', 'description', 'difficulty', 'category'];

    public function options(){
        return $this->hasMany(DetailCourseOption::class);
    }
}
