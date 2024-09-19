<?php

namespace App\Models\JobSeeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobSeeker\JobSeeker;
use App\Models\Employer\JobListing;
use App\Models\user;
use App\Models\JobSeeker\Application;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobseeker_id',
        'job_listing_id',
        'resume',
        'cover_letter',
        'job_status'
    ];

    public function jobListing()
    {
        return $this->belongsTo(JobListing::class, 'job_listing_id');
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'jobseeker_id');
    }

  
}
