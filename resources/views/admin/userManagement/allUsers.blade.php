@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid p-5 pt-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="text-center mx-auto mb-0">All Users</h1>
                    </div>

                    <div class="card-body p-0 pt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th> Name </th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>

                                            <td class="align-middle">{{ $user->id }}</td>
                                            <td class="align-middle">{{ $user->first_name . ' ' . $user->last_name }}</td>
                                            <td class="align-middle">{{ $user->email }}</td>
                                            <td class="align-middle">{{ $user->phone }}</td>
                                            <td class="align-middle">{{ $user->address }}</td>
                                            <td class="align-middle">{{ $user->role }}</td> 
                                            <td class="align-middle">
                                                @if ($user->status == 'pending')
                                                    <span class="badge bg-primary status-modal cursor-pointer p-2" style="cursor: pointer"
                                                        data-bs-toggle="modal" data-bs-target="#statusModal"
                                                        data-user-id="{{ $user->id }}">{{ $user->status }}</span>
                                                @elseif ($user->status == 'active')
                                                    <span class="badge bg-success text-dark status-modal cursor-pointer p-2" style="cursor: pointer"
                                                        data-bs-toggle="modal" data-bs-target="#statusModal"
                                                        data-user-id="{{ $user->id }}">{{ $user->status }}</span>
                                                @elseif ($user->status == 'blocked')
                                                    <span class="badge bg-danger status-modal cursor-pointer p-2" style="cursor: pointer"
                                                        data-bs-toggle="modal" data-bs-target="#statusModal"
                                                        data-user-id="{{ $user->id }}">{{ $user->status }}</span>
                                                @else
                                                    <span class="badge bg-warning status-modal">{{ $user->status }}</span>
                                                @endif
                                            </td>
                                            <td class="align-middle" style="width:300px">
                                                
                                                <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-success btn-lg"
                                                        onclick="return confirm('Are you sure to delete?')">Delete</button>
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

    <div class="modal fade" id="statusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="statusForm" action="{{ route('admin.user.changeStatus') }}" method="POST">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <select id="largeSelect" name="status" class="form-control form-select ">
                              <option value="active">Active</option>
                              <option value="blocked">Block</option>
                            </select>
                          </div>

                        <input type="hidden" id="userId" name="userId" value="">
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
            var userId = $(this).data('user-id');
            console.log(userId)
            $('#userId').val(userId);
        });
    
        // Add an event listener to the modal to reset the form when it is closed
        $('#statusModal').on('hidden.bs.modal', function () {
            $('#statusForm')[0].reset();
        });
    </script>
@endsection
