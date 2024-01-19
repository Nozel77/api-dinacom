<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListJob extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = ['company_name', 'jobdesk', 'description', 'location', 'type_job', 'company_image', 'sallary_min', 'sallary_max'];
 
}
