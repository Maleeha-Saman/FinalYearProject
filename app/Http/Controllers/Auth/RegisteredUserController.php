<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use app\Models\Employer;
use app\Models\Jobseeker;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','min:8', 'confirmed'],
            'password_confirmation' => ['required','min:8'],
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required', 
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profile_picture = $request->file('profile_picture');
        $profile_picture_new_name = time().$profile_picture->getClientOriginalName();
        $profile_picture->move('assets/image', $profile_picture_new_name);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
            'status' => 'active',
            'profile_picture' => $profile_picture_new_name,
        ]);

        // role is employer then add one employer
        // else if role is jobseeker then add one jobseeker
        // then add new jobseeker
        if($request->role == 'employer'){
            $user->employer()->create([
                'company_name' => 'abc',
                'mission' => 'abc'
            ]);
        }elseif($request->role == 'jobseeker'){
            $user->jobseeker()->create([
                'education' => 'abc',
                'experience' => 'abc',
                'skill' => 'abc',
                'salary' => 'abc',
                'resume' => 'abc',
                'cover_letter' => 'abc',
            ]);
        }

      



        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
