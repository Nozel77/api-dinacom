<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $fillable = ['image_course','title','description','percentage','difficulty','category'];

    public function user(){
        return $this->belongsToMany(User::class, 'course_user');
    }
}

        