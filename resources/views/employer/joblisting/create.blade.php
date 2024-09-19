@extends('Employer.layouts.app')
@section('title', 'Create job listing')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Create Job Post</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('employer.joblisting.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="tile" class="form-label">Job Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Product title" style="height: 40px;" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" placeholder="Enter Company name" style="height: 40px;" value="{{ old('company_name') }}" required>
                                @error('company_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="salary" class="form-label"> Salary</label>
                                <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" placeholder="Enter  salary" style="height: 40px;" value="{{ old('salary') }}" required>
                                @error('salary')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="skill" class="form-label">Skill</label>
                                <input type="text" name="skill" class="form-control @error('skill') is-invalid @enderror" id="skill" placeholder="Enter  skill" style="height: 40px;" value="{{ old('skill') }}" required>
                                @error('skill')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class=" col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter Description" style="height: 80px;" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="job_type" class="form-label">Job Type</label>
                                <select name="job_type" class="form-select @error('job_type') is-invalid @enderror" id="job_type" style="height: 40px;" required>
                                    <option value="">Select Job Type</option>
                                    <option value="full_time" {{ old('job_type') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ old('job_type') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                    <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                                </select>
                                @error('job_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="number" name="experience" class="form-control @error('experience') is-invalid @enderror" id="experience" placeholder="Enter  experience" style="height: 40px;" value="{{ old('experience') }}" required>
                                @error('experience')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Enter  location" style="height: 40px;" value="{{ old('location') }}" required>
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            </div>
                            </div>
                            <div class="row mb-3 ms-2">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create Job Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
