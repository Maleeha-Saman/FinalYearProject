@extends('employer.layouts.app')
@section('content')
<div class="container-fluid p-5 pt-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="text-center mx-auto mb-0">Job List</h1>
                    <a href="{{ route('employer.joblisting.create') }}" class="btn btn-primary btn-lg">Add Job Post</a>
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
                                    <th>No of C</th>
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
                                        <td class="align-middle">{{ $job->applications_count }}</td>
                                        <td class="align-middle" style="width:300px">
                                            <a href="{{ route('employer.joblisting.show', $job->id) }}" class="btn btn-success btn-lg">View</a>
                                            <a href="{{ route('employer.joblisting.edit', $job->id) }}" class="btn btn-primary btn-lg">Edit</a>
                                            <form action="{{ route('employer.joblisting.delete', $job->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                            </form>
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
