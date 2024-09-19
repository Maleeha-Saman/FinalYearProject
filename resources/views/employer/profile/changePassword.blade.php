@extends('employer.layouts.app')
<style>
.btn-custom-primary {
    background-color: #007bff !important;
    border-color: #007bff !important; 
    color: white !important; 
}


</style>
@section('content')
<div class="col container ">
    <div class="row d-flex align-items-center justify-content-center h-100">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body m-3">
                    <form method="POST" action="{{ route('employer.updatePassword')}}">
                        @csrf
                        <!-- Display general validation errors -->
                
                        <div class="row mb-5">
                            <!-- Old Password field -->
                            <label for="oldPassword" class="col-md-4 col-form-label text-md-end">{{ __('Old Password') }}</label>
                            <div class="col-md-6">
                                <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" required autocomplete="current-password">
                                @error('oldPassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <!-- New Password field -->
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <!-- Confirm Password field -->
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-custom-primary">
                                {{ __('Change Password') }}
                            </button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
    
@endsection