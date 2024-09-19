<?php

namespace App\Models\Employer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Employer\JobListing;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'mission',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobListings()
    {
        return $this->hasMany(JobListing::class);
    }
   
}
