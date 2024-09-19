@extends('employer.layouts.app')
@section('content')
<div class="container-fluid p-5 pt-1">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="text-center mx-auto mb-0">Applied Condidate</h1>
                </div>
                
                <div class="card-body p-0 pt-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>phone</th>
                                    <th>email</th>
                                    <th>Education</th>
                                    <th>Skill</th>
                                    <th>Experience</th>
                                    <th>address</th>
                                    <th>Resume</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $job)
                                    <tr>
                                        <td class="align-middle">{{ $loop->index + 1 }}</td>
                                        <td class="align-middle">{{ $job->jobseeker->user->first_name .' '.$job->jobseeker->user->last_name }}</td>
                                        <td class="align-middle">{{ $job->jobseeker->user->phone }}</td>
                                        <td class="align-middle">{{ $job->jobseeker->user->email }}</td>
                                        <td class="align-middle">{{ $job->jobseeker->education }}</td>
                                        <td class="align-middle">{{ $job->jobseeker->skill }}</td>
                                        <td class="align-middle">{{ $job->jobseeker->experience }}</td>
                                        <td class="align-middle">{{ $job->jobseeker->user->address}}</td>
                                        <td class="align-middle">
                                            @if ($job->resume)
                                            <a class="mt-2 me-2" href="{{ asset('assets/aplication/resume/' . $job->resume) }}" class="btn btn-primary" target="_blank">Download CV</a>
                                             @endif
                                        </td>
                                        <td class="align-middle" style="width:300px">
                                            @if ($job->job_status == 'pending')
                                                    <span class="badge bg-primary status-modal cursor-pointer p-2" style="cursor: pointer"
                                                        data-bs-toggle="modal" data-bs-target="#statusModal"
                                                        data-job-id="{{ $job->id }}">{{ $job->job_status }}</span>
                                                @elseif ($job->job_status == 'accept')
                                                    <span class="badge bg-success text-dark status-modal cursor-pointer p-2" style="cursor: pointer"
                                                        data-bs-toggle="modal" data-bs-target="#statusModal"
                                                        data-job-id="{{ $job->id }}">{{ $job->job_status }}</span>
                                                @else
                                                    <span class="badge bg-danger status-modal cursor-pointer p-2" style="cursor: pointer"
                                                        data-bs-toggle="modal" data-bs-target="#statusModal"
                                                        data-job-id="{{ $job->id }}">{{ $job->job_status }}</span>
                                                @endif

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


<div class="modal fade" id="statusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="statusForm" action="{{ route('employer.condidate.applied.status') }}" method="POST">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    <div class="form-group">
                        <select id="largeSelect" name="job_status" class="form-control form-select ">
                          <option value="accept">Accept</option>
                          <option value="reject">Reject</option>
                        </select>
                      </div>

                    <input type="hidden" id="jobId" name="jobId" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Change</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('.status-modal').click(function () {
        var jobId = $(this).data('job-id');
        console.log(jobId)
        $('#jobId').val(jobId);
    });

    // Add an event listener to the modal to reset the form when it is closed
    $('#statusModal').on('hidden.bs.modal', function () {
        $('#statusForm')[0].reset();
    });
</script>
@endsection
