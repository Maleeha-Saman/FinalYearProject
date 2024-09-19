@extends('jobseeker.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="text-center mx-auto mb-0">JobSeeker Dashboard</h1>
                    </div>
                    
                    <div class="card-body p-0 pt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Company Name</th>
                                        <th>Job Title</th>
                                        <th>Salary</th>
                                        <th>Skill</th>
                                        <th>Description</th>
                                        <th>Experience</th>
                                        <th>Location</th>
                                        <th>Job Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobListings as $job)
                                        <tr>
                                            <td class="align-middle">{{ $loop->index + 1 }}</td>
                                            <td class="align-middle">{{ $job->employer->company_name }}</td>
                                            <td class="align-middle">{{ $job->title }}</td>
                                            <td class="align-middle">{{ $job->salary }}</td>
                                            <td class="align-middle">{{ $job->skill }}</td>
                                            <td class="align-middle">{{ $job->description }}</td>
                                            <td class="align-middle">{{ $job->experience }}</td>
                                            <td class="align-middle">{{ $job->location }}</td>
                                            <td class="align-middle">{{ $job->employment_type }}</td>
                                            <td class="align-middle" style="width:300px">
                                                <a href="{{ route('jobseeker.joblisting.detail', $job->id) }}" class="btn btn-danger btn-lg">Apply</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
