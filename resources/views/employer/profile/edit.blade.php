@extends('employer.layouts.app')
@section('title', 'edit Product')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Edit Profile</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employer.update.profile', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="row " style="height:150px;">
                                        <div class="col-8 border d-flex align-items-center justify-content-center">
                                            @if ($user->profile_picture)
                                                <img id="image-preview"
                                                    src="{{ asset('assets/image/' . $user->profile_picture) }}"
                                                    alt="Image Preview" class="rounded-circle" style=" max-width: 100%; height: 150px;">
                                            @endif
                                        </div>
                                        <div class="col-4 ">
                                            <label for="image" class="form-label">Profile Image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                                id="image" style="height: 40px;">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                        placeholder="Enter first name" style="height: 40px;"
                                        value="{{ $user->first_name }}">
                                    @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                        placeholder="Enter last name" style="height: 40px;" value="{{ $user->last_name }}">
                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        placeholder="Enter phone" style="height: 40px;" value="{{ $user->phone }}">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror" id="address"
                                        placeholder="Enter Your Address" style="height: 40px;" value="{{ $user->address }}">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" name="companyName"
                                        class="form-control @error('companyName') is-invalid @enderror" id="companyName"
                                        placeholder="Enter Your Company Name" style="height: 40px;" value="{{ $user->employer->company_name }}">
                                    @error('companyName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="mission" class="form-label">Mission</label>
                                    <input type="text" name="mission"
                                        class="form-control @error('mission') is-invalid @enderror" id="mission"
                                        placeholder="Enter Your Mission" style="height: 40px;" value="{{ $user->employer->mission }}">
                                    @error('mission')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to preview the selected image
        document.getElementById('image').addEventListener('change', function(e) {
            var imagePreview = document.getElementById('image-preview');
            var input = e.target;
            var reader = new FileReader();

            reader.onload = function() {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endsection
