<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;
    protected $table = 'internship';
    protected $fillable = ['company_name', 'position', 'company_image', 'batch'];
}
