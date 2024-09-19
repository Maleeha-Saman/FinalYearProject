@extends('employer.layouts.app')
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">job Details</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="title" class="form-label">Job Title</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $job->title }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="company_name" class="form-label
                                ">Company Name</label>
                            <input type="text" name="company_name" class="form-control" id="company_name" value="{{
                                $job->company_name }}" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" name="tisalary" class="form-control" id="tisalary" value="{{ $job->tisalary }}"
                                readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">job Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3"
                                readonly>{{ $job->description }}</textarea>
                        </div> 
                        <div class="col-6 mb-3">
                            <label for="skill" class="form-label">Skill</label>
                            <input type="text" name="skill" class="form-control" id="skill" value="{{ $job->skill }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text" name="experience" class="form-control" id="experience" value="{{ $job->experience }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" id="location" value="{{ $job->location }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="employment_type" class="form-label">Job Type</label>
                            <input type="tex" name="employment_type" class="form-control" id="employment_type" value="{{ $job->employment_type }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="no_of_condiate" class="form-label">Number of Applied Condidate</label>
                            <div>
                                <a href="{{ route('employer.condidate.applied',$job->id) }}" class="btn btn-success btn-lg">
                                    <div class="boder-primary">{{ $job->applications_count }}</div>
                                </a>
                            </div>
                        </div>
                         
                       
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('employer.joblisting.index') }}" class="btn btn-primary btn-lg">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection