<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employer\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employer = User::where('role', 'employer')->first();
        if ($employer) {
            Employer::create([
                'user_id' => $employer->id,
                'company_name' => 'ABC Company',
                'mission' => 'We are the best company in the world.',
                'status' => 'active',
            ]);
        }
    }
}
