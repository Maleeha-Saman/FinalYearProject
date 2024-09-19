@extends('jobseeker.layouts.app')
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">job Details</h1>
                </div>
                <form action="{{ route('jobseeker.job.apply', $user->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="title" class="form-label fw-bold">Job Title</label>
                            <h6>{{ $job->title }}</h6>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="company_name" class="form-label fw-bold
                                ">Company Name</label>
                            <h6>{{ $job->employer->company_name }}</h6>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="salary" class="form-label fw-bold">Salary</label>
                            <h6>{{ $job->salary }}</h6>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="description" class="form-label fw-bold">job Description</label>
                            <h6>{{ $job->description }}</h6>
                        </div> 
                        <div class="col-6 mb-3">
                            <label for="skill" class="form-label fw-bold">Skill</label>
                            <h6>{{ $job->skill }}</h6>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="experience" class="form-label fw-bold">Experience</label>
                            <h6>{{ $job->experience }}</h6>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="location" class="form-label fw-bold">Location</label>
                            <h6>{{ $job->location }}</h6>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="employment_type" class="form-label fw-bold">Job Type</label>
                            <h6>{{ $job->employment_type }}</h6>
                        </div>
                        <hr>
                        <div class="mb-4">
                            <h5 class="text-center">Upload Document</h5>
                        </div>
                         
                        <div class="col-6 mb-3">
                            <label for="resume" class="form-label fw-bold">Resume</label>
                            
                            @if ($user->jobseeker && $user->jobseeker->resume)
                            <div class="mb-2">
                                <a href="{{ asset('assets/resume/' . $user->jobseeker->resume) }}" target="_blank">
                                    View Current Resume
                                </a>
                            </div>
                            @endif
                            <input type="file" name="resume" class="form-control @error('resume') is-invalid @enderror" id="resume" style="height: 40px;" accept="application/pdf">
                            
                            @error('resume')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <p>upoad just pdf file</p>
                        </div>
                        
                        
                        
                        <div class="col-6 mb-3">
                            <label for="cover_letter" class="form-label fw-bold">Cover Letter</label>
                            
                            @if ($user->jobseeker && $user->jobseeker->cover_letter)
                            <div class="mb-2">
                                <a href="{{ asset('assets/cover_letters/' . $user->jobseeker->cover_letter) }}" target="_blank">
                                    View Current Cover Letter
                                </a>
                            </div>
                            @endif
                            
                            <input type="file" name="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror" id="cover_letter" style="height: 40px;" accept="application/pdf">
                            
                            @error('cover_letter')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <p>uplaod just pdf file</p>
                        </div>
                </div>
                </div>
                
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-lg" onclick="window.history.back()">Back</button>
                        </div>
                        @if ($applied)
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-success btn-lg" disabled> already Applied</button>
                        </div>
                        @else
                        <div class="col-md-6 text-end">
                            <button type="submit" class="btn btn-success btn-lg">Apply</button>
                        </div>
                        @endif
                    </div>
                </div>
                
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection