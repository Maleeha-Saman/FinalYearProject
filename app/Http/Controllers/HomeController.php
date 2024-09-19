<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer\JobListing;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return view('admin.layouts.dashboard');
        } elseif (auth()->user()->role == 'employer') {
            return view('employer.layouts.dashboard');
        } elseif (auth()->user()->role == 'jobseeker') {
            $jobListings = JobListing::where('status', 'active')->get();
            return view('jobseeker.layouts.dashboard', compact('jobListings'));
        }
    }
}
