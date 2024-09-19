<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Jobseeker\Jobseeker;
use Validator;
use App\Models\Employer\JobListing;




class JobSeekerController extends Controller
{

    public function changePassword(){
        return view('jobseeker.profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::id());
        if (password_verify($request->input('oldPassword'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
           return redirect()->route('jobseeker.changePassword')
                ->with('success', 'Password updated successfully');
        } else {
            return redirect()->route('jobseeker.changePassword')
                ->with(['oldPassword' => 'Old password is incorrect', 
                'error' => 'Old password is incorrect'])
                ->withInput();
        }
    }
    public function jobseekerDashboard(){
        $jobListings = JobListing::where('status', 'active')->get();
        return view('jobseeker.layouts.dashboard', compact('jobListings'));
    }

    public function profileDetail(){
        $user = User::with('jobseeker')->find(Auth::id());
        return view('jobseeker.profile.profileDetail', compact('user'));
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('jobseeker.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
            'experience' => ['required'],
            'skill' => ['required', 'string', 'max:255'],
            'resume' => ['mimes:pdf', 'max:2048'],
            'cover_letter'=> ['mimes:pdf', 'max:2048'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('jobseeker.edit.profile', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Handle image upload first
        if ($request->hasFile('image')) {
            if (!is_null($user->profile_picture)) {
                $image_path = 'assets/image/' . $user->profile_picture;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $image = $request->file('image');
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image->move('assets/image', $image_new_name);
            $user->profile_picture = $image_new_name;
        }

        // Save user data
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        $jobseeker = $user->jobseeker;
        if (!$jobseeker) {
            $jobseeker = new Jobseeker();
            $jobseeker->user_id = $user->id;
        }

        $jobseeker->education = $request->education;
        $jobseeker->experience = $request->experience;
        $jobseeker->skill = $request->skill;

        if ($request->hasFile('resume')) {
            if (!is_null($jobseeker->resume)) {
                $resume_path = 'assets/resume/' . $jobseeker->resume;
                if (file_exists($resume_path)) {
                    unlink($resume_path);
                }
            }

            $resume = $request->file('resume');
            $resume_new_name = time() . '_' . $resume->getClientOriginalName();
            $resume->move('assets/resume', $resume_new_name);
            $jobseeker->resume = $resume_new_name;
        }

        if ($request->hasFile('cover_letter')) {
            if (!is_null($jobseeker->cover_letter)) {
                $cover_letter_path = 'assets/cover_letter/' . $jobseeker->cover_letter;
                if (file_exists($cover_letter_path)) {
                    unlink($cover_letter_path);
                }
            }

            $cover_letter = $request->file('cover_letter');
            $cover_letter_new_name = time() . '_' . $cover_letter->getClientOriginalName();
            $cover_letter->move('assets/cover_letter', $cover_letter_new_name);
            $jobseeker->cover_letter = $cover_letter_new_name;
        }

        $jobseeker->save();

        return redirect()->route('jobseeker.profile')->with('success', 'Profile updated successfully');
    }

    public function jobseekerLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function create()
    {
        return view('layouts.jobseekerCreate');
    }

    
        public function search(Request $request)
    {
        $jobs = JobListing::where('title', 'like', '%'.$request->search.'%')
            ->orWhere('description', 'like', '%'.$request->search.'%')
            ->orWhere('skill', 'like', '%'.$request->search.'%')
            ->orWhere('experience', 'like', '%'.$request->search.'%')
            ->orWhere('salary', 'like', '%'.$request->search.'%')
            ->orWhere('employment_type', 'like', '%'.$request->search.'%')
            ->orWhere('location', 'like', '%'.$request->search.'%')
            ->get();
        return response()->json($jobs);
    }
    
}
