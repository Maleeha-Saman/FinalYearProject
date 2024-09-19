<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employer\Employer;
use Validator;


class EmployerController extends Controller
{

    public function changePassword(){
        return view('employer.profile.changePassword');
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
           return redirect()->route('employer.changePassword')
                ->with('success', 'Password updated successfully');
        } else {
            return redirect()->route('employer.changePassword')
                ->with(['oldPassword' => 'Old password is incorrect', 
                'error' => 'Old password is incorrect'])
                ->withInput();
        }
    }
    public function employerDashboard(){
        return view('employer.layouts.dashboard');
    }

    public function profileDetail(){
        $user = User::with('employer')->find(Auth::id());
      
        return view('employer.profile.profileDetail', compact('user'));
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('employer.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => 'required',
            'phone' => 'required',
            'companyName' => 'required|string|max:255',
            'mission' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) {
            if (!is_null($user->profile_picture)) {
                $image_path = 'assets/image/' . $user->profile_picture;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $image = $request->file('image');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('assets/image', $image_new_name);
            $user->profile_picture = $image_new_name;
        }

        // Save user data
        $user->save();

        
        $employer = $user->employer; 
        if (!$employer) {
            // Create new employer record if not exists (optional)
            $employer = new Employer();
            $employer->user_id = $user->id; 
        }

        $employer->company_name = $request->companyName;
        $employer->mission = $request->mission;
        $employer->save();

        return redirect()->route('employer.profile')->with('success', 'Profile updated successfully');
    }
    
    public function employerLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function create()
    {
        return view('layouts.employerCreate');
    }
}
