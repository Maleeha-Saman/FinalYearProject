<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create admin 
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => 'Dhaka, Bangladesh',
            'phone' => '01700000000',
            'role' => 'admin',
            'status' => 'active',
        ]);

        // create employer
        User::create([
            'first_name' => 'Employer',
            'last_name' => 'Employer',
            'email' => 'employer@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => 'Dhaka, Bangladesh',
            'phone' => '01700000000',
            'role' => 'employer',
            'status' => 'active',
        ]);

        // create jobseeker
        User::create([
            'first_name' => 'Jobseeker',
            'last_name' => 'Jobseeker',
            'email' => 'jobseeker@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => 'Dhaka, Bangladesh',
            'phone' => '01700000000',
            'role' => 'jobseeker',
            'status' => 'active',
        ]);

        $this->command->info('Admin, Employer and JobSeeker users created successfully.');
    }
}
