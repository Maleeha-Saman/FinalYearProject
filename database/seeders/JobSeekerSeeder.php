<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobSeeker\JobSeeker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class JobSeekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobseeker = User::where('role', 'jobseeker')->first();
        if ($jobseeker) {
            JobSeeker::create([
                'user_id' => $jobseeker->id,
                'skill' => 'PHP, Laravel, Vue.js',
                'education' => 'BSc in CSE',
                'experience' => '3 years',
                'resume' => 'resume.pdf',
                'cover_letter' => 'cover_letter.pdf',
                'status' => 'active',
            ]);
        }
    }
}
