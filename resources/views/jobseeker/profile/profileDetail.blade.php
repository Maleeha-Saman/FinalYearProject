@extends('jobseeker.layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h3 class="mb-0">User Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">

                                @if (auth()->user()->profile_picture && file_exists(public_path('assets/image/' . auth()->user()->profile_picture)))
                                    <img src="{{ asset('assets/image/' . auth()->user()->profile_picture) }}"
                                    class="avatar img-fluid rounded-circle w-100 h-auto" alt="User Profile Picture">
                                @else 
                                    <img src="{{ asset('assets/image/account.png') }}" alt="{{ $user->name }}"
                                        class="avatar img-fluid rounded-circle w-100 h-auto" alt="Default Profile Picture">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4 class="card-title"><span>Name   : </span>{{ $user->first_name }} {{ $user->last_name }} </h4>
                                <p class="card-text"><strong>Role   : {{ $user->role }}</strong></p>
                                <p class="card-text"><strong>Email  : {{ $user->email }}</strong></p>
                                <p class="card-text"><strong>Phone  : {{ $user->phone }}</strong></p>
                                <p class="card-text"><strong>Address: {{ $user->address }}</strong></p>
                                <p class="card-text"><strong>Joined : </strong> {{ $user->created_at->format('F d, Y') }}</p>
                                <hr>
                                <p class="card-text"><strong>Education   : {{ $user->jobseeker->education }}</strong></p>
                                <p class="card-text"><strong>Experience   : {{ $user->jobseeker->experience }}</strong></p>
                                <p class="card-text"><strong>Skills   : {{ $user->jobseeker->skill }}</strong></p>
                                @if ($user->jobseeker->resume)
                                    <a class="mt-2 me-2" href="{{ asset('assets/resume/' . $user->jobseeker->resume) }}" class="btn btn-primary" target="_blank">Download CV</a>
                                @endif
                                @if ($user->jobseeker->cover_letter)
                                    <a class="mt-2 ms-2" href="{{ asset('assets/cover_letter/' . $user->jobseeker->cover_letter) }}"
                                        class="btn btn-primary" target="_blank">Download Cover Letter</a>
                                @endif

                                <!-- Add more profile details here -->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('jobseeker.edit.profile', ['id' => $user->id]) }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
