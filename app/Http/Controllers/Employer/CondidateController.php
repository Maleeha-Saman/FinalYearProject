<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSeeker\JobSeeker;
use App\Models\Employer\Employer;
use App\Models\JobListing\JobListing;
use App\Models\JobSeeker\Application;


class CondidateController extends Controller
{
    public function appliedCondidate($id){

        $employer = auth()->user()->employer;
        $job = $employer->jobListings()->with('applications.jobSeeker.user')->findOrFail($id);
        $applications = $job->applications;
        return view('employer.condidate.indix', compact('job', 'applications'));
    }

    public function appliedCondidatechangeStatus(Request $request){
          $aplication = Application::findOrFail($request->jobId);
            $aplication->job_status = $request->job_status;
            $aplication->save();
        return redirect()->back()->with('message', 'Job status updated successfully');
    }
}
