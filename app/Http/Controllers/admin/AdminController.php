<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;


class AdminController extends Controller
{

    public function changePassword(){
        return view('admin.profile.changePassword');
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
           return redirect()->route('admin.changePassword')
                ->with('success', 'Password updated successfully');
        } else {
            return redirect()->route('admin.changePassword')
                ->with(['oldPassword' => 'Old password is incorrect', 
                'error' => 'Old password is incorrect'])
                ->withInput();
        }
    }

    public function profileDetail()
    {
        $user = User::find(Auth::id());
        return view('admin.profile.profileDetail', compact('user'));
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request, $id){
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => 'required',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if($request->hasFile('image')){
            if (!is_null($user->profile_picture)){
                $image_path = 'assets/image/'.$user->profile_picture;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $image = $request->file('image');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('assets/image', $image_new_name);
            $user->profile_picture = $image_new_name;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');

    }

    public function adminLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function adminDashboard(){
        return view('admin.layouts.dashboard');
    }
}
