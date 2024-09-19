<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer\JobListing;
use App\Models\Employer\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class JobListingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

    // Check if the user is an employer and load their job listings with the count of applications
    if ($user->employer) {
        $jobListings = $user->employer->jobListings()->withCount('applications')->get();
    } else {
        abort(404, 'Employer not found.');
    }
        return view('employer.joblisting.index', compact('jobListings'));
    }

    public function create()
    {
        return view('employer.joblisting.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company_name' => 'required', // 
            'description' => 'required',
            'salary' => 'required', 
            'location' => 'required',
            'skill' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
        ]);

        $jobListing = auth()->user()->employer->jobListings()->create([
            'title' => $request->title,
            'company_name' => $request->company_name, // Add this line
            'description' => $request->description,
            'salary' => $request->salary,
            'location' => $request->location,
            'skill' => $request->skill,
            'experience' => $request->experience,
            'employment_type' => $request->job_type,
        ]);

        
        return redirect()->route('employer.joblisting.index')->with('success', 'Job listing created successfully');
    }

    public function show($id)
    {
        $employer = Auth::user()->employer;
    $job = $employer->jobListings()->withCount('applications')->findOrFail($id);

    return view('employer.joblisting.show', compact('job'));
    }
    public function edit($id)
    {
        $job = auth()->user()->employer->jobListings()->findOrFail($id);
        return view('employer.joblisting.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'company_name' => 'required', // Add this line
            'description' => 'required',
            'salary' => 'required', 
            'location' => 'required',
            'skill' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
        ]);

        $job = auth()->user()->employer->jobListings()->findOrFail($id);
        $job->update([
            'title' => $request->title,
            'company_name' => $request->company_name, // Add this line
            'description' => $request->description,
            'salary' => $request->salary,
            'location' => $request->location,
            'skill' => $request->skill,
            'experience' => $request->experience,
            'employment_type' => $request->job_type,
        ]);

        return redirect()->route('employer.joblisting.index')->with('success', 'Job listing updated successfully');
    }

    public function destroy($id)
    {
        $job = auth()->user()->employer->jobListings()->findOrFail($id);
        $job->delete();
        return redirect()->route('employer.joblisting.index')->with('success', 'Job listing deleted successfully');
    }
}
