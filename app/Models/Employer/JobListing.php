<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employer\Employer;
use App\Models\User;
use App\Models\JobSeeker\Application;
class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'location',
        'skill',
        'experience',
        'salary',
        'employment_type',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_listing_id');
    }
}
