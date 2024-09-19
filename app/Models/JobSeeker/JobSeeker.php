<?php

namespace App\Models\JobSeeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skill',
        'education',
        'experience',
        'resume',
        'cover_letter',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
