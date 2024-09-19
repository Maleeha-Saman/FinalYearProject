<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer\JobListing;
use App\Models\JobSeeker\Application;
use App\Models\JobSeeker\JobSeeker;



class ApplicationController extends Controller
{
    public function jobListingDetail($id)
    {
        $job = JobListing::find($id);
        $user = auth()->user();
        $applied = Application::where('job_listing_id', $id)->where('jobseeker_id', $user->jobseeker->id)->first();
        return view('jobseeker.application.detail', compact('job', 'user', 'applied'));
    }

    public function jobListingDetailSearch($id)
    {
        $job = JobListing::find($id);
        $user = auth()->user();
        $applied = Application::where('job_listing_id', $id)->where('jobseeker_id', $user->jobseeker->id)->first();
        return view('jobseeker.application.detail', compact('job', 'user', 'applied'));
    }

    public function jobApply(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf',
            'cover_letter' => '|mimes:pdf'
        ]);

        $aplication = new Application();
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resume_new_name = time() . '_' . $resume->getClientOriginalName();
            $resume->move('assets/aplication/resume', $resume_new_name);
            $aplication->resume = $resume_new_name;
        }

        if ($request->hasFile('cover_letter')) {
            $cover_letter = $request->file('cover_letter');
            $cover_letter_new_name = time() . '_' . $cover_letter->getClientOriginalName();
            $cover_letter->move('assets/aplication/cover_letter', $cover_letter_new_name);
            $aplication->cover_letter = $cover_letter_new_name;
        }

        $aplication->job_listing_id = $request->job_id;
        $aplication->jobseeker_id = auth()->user()->jobseeker->id;
        $aplication->save();

        return redirect()->route('jobseeker.dashboard')->with('success', 'Job applied successfully');
    }

    public function jobApplied()
    {
        $user = auth()->user();

        // Ensure the user has a jobseeker profile
        if (!$user || !$user->jobseeker) {
            abort(404);
        }
    
        // Fetch only the applied job listings with related job and employer data
        $appliedJobs = Application::where('jobseeker_id', $user->jobseeker->id)
                                  ->with(['jobListing.employer'])
                                  ->get()
                                  ->pluck('jobListing');
    
        return view('jobseeker.application.applied', compact('user', 'appliedJobs'));
    }
}
