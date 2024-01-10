<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailJob extends Model
{
    use HasFactory;
    protected $table = 'detail_jobs';
    protected $fillable = ['company_name', 'jobdesk', 'location', 'type_job', 'company_image', 'jobdesk_description', 'jobdesk_requirement'];

    protected $casts = [
        'jobdesk_description' => 'array',
        'jobdesk_requirement' => 'array',
    ];
}
