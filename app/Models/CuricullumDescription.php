<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuricullumDescription extends Model
{
    use HasFactory;
    protected $fillable = ['curicullum_id', 'description_id' ];
    public $timestamps = false;
}
