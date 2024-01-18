<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInternship extends Model
{
    use HasFactory;
    protected $table = 'detail_internships';
    protected $fillable = [
        'title',
        'category',
        'description',
        'image_company',
        'image_banner',
    ];
}
