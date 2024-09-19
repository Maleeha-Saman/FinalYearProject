@extends('layouts.guest')

@section('content')
<div class="container-fluid bg-primary"  style="height: 100vh !important">
    <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                 
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3 text-center">
                            <div class="col-md-2 mx-auto">
                                <label for="profile_picture" class="col-form-label">{{ __('Profile Picture') }}</label>
                                <div class="mb-3">
                                    <img src="{{ asset('assets/image/account.png') }}" id="avatar" class="img-fluid rounded-circle" alt="Avatar" style="width: 100px !important; height: 100px !important;">
                                </div>
                                <input id="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror" accept="image/*" name="profile_picture" onchange="displayImage(this)">
                                @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 d-flex">
                            
                            <div class="col-md-6">
                            <label for="first_name" class="col-md-4 col-form-label">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                            <label for="last_name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" >

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                            <label for="address" class="col-md-4 col-form-label">{{ __('Address') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="col-md-4 col-form-label">{{ __('phone') }}</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="row mt-5">
                                        <legend class="col-form-label col-sm-2 pt-0">{{ __('User Type') }}</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio" name="role" id="jobSeeker" value="jobSeeker" {{ old('role') == 'jobSeeker' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="jobSeeker">
                                                    {{ __('JobSeeker') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="employer" value="employer" {{ old('role') == 'employer' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="employer">
                                                    {{ __('Employer') }}
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
    
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="col-md-6">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-2 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Or   Login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function displayImage(input) {
        var avatar = document.getElementById('avatar');
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                avatar.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>