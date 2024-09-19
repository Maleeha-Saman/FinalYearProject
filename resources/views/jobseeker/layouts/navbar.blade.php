<style>
    .input-group input:focus {
        outline: none !important;
        box-shadow: none;

    }

    .input-group input:not(:placeholder-shown)+.input-group-text {
        z-index: 3;
    }

    .response-class {
        padding: 5px;
        text-decoration: none;
        color: black;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        display: block;
        border-radius: 5px;
    }

    .response-class:hover {
        text-decoration: none;
        color: black;
        background-color: lightblue;
        /* Dark background color on hover */
        box-shadow: 0 4px 8px rgba(14, 12, 12, 0.1);
        border 1px solid #000;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<nav class="row navbar navbar-expand py-3 mx-0">
    <div class="col-1">

    </div>
    <div id="searchId" class="col-4 d-none d-md-block  p-0">
        <form class="d-flex mx-auto">
            <div class="input-group">
                <input id="searchInput1" class="form-control rounded-start" type="search"
                    placeholder="Search..." aria-label="Search..." data-bs-toggle="modal"
                    data-bs-target="#exampleModal" />
                <a class="btn btn-outline-dark rounded-end" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bi-search"></i>
                </a>
            </div>
        </form>
    </div>
    <div class="col-6 col-sm-3 navbar-collapse collapse pe-4 ">
        <ul class="navbar-nav ms-auto ">
            <li class="nav-item dropdown">
                <div class="d-inline-block">{{ auth()->user()->first_name }}</div>
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    @if (auth()->user()->profile_picture && file_exists(public_path('assets/image/' . auth()->user()->profile_picture)))
                        <img src="{{ asset('assets/image/' . auth()->user()->profile_picture) }}" class="avatar img-fluid"
                            alt="User Profile Picture">
                    @else
                        <img src="{{ asset('assets/image/account.png') }}" class="avatar img-fluid"
                            alt="Default Profile Picture">
                    @endif
                </a>

                <ul class="dropdown-menu dropdown-menu-end rounded">
                    <li class="text-center"><a class="dropdown-item" href="#">
                            <span
                                class="fw-bold text-muted ">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('jobseeker.profile') }}"><i class="lni lni-user"></i>
                            <span>profile</span></a></li>
                    <li>
                    <li><a class="dropdown-item" href="{{ route('jobseeker.changePassword') }}">
                        <i class="lni lni-key"></i>
                        <span>Change Password</span></a></li>
                    <li>
                        <form action="{{ route('jobseeker.logout.custom') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="lni lni-exit"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pb-2 pe-2 pt-2">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <!-- Your modal body content goes here -->

                    <div class="form-group">

                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search..."
                                autofocus>
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="pt-3">
                        <ul class="ps-0" id="searchResults"></ul>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS (if any) -->
    <link href="{{ asset('path/to/your/custom.css') }}" rel="stylesheet">

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
      $(document).ready(function() {
            $('#exampleModal').on('shown.bs.modal', function() {
                $('#searchResults').empty();
                $('#searchInput').trigger('focus');
            });

            $('#exampleModal').on('hidden.bs.modal', function() {
                $('#searchResults').empty();
                $('#searchInput').val('');
                $('#searchInput').trigger('blur');
            });


            $('#searchInput').on('keyup', function() {
                // Get the value from the input field
                const search = $(this).val();

                if (search.length == "") {
                    $('#searchResults').empty();
                    return;
                } else if (search.length < 3) {
                    $('#searchResults').html('<p>Enter at least 3 characters.</p>');
                    return;
                } else {
                    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                    // Perform an AJAX request to your server with the query
                    $.ajax({
                        url: '{{ route('visitor.search') }}', // Replace with your actual endpoint
                        method: 'GET',
                        data: {
                            search: search
                        },
                        success: function(data) {
                            // Update the modal body with the search results
                            const resultsList = $('#searchResults');
                            resultsList.empty(); // Clear previous results
                            console.log(data);

                            if (data.length > 0) {

                                $.each(data, function(index, result) {
                                    // var showPageUrl = '/renter/houseAd/show/' + result.id;
                                    var showPageUrl = '{{ url("/job-listing") }}/' + result.id;
                                    $('#searchResults').append(
                                        '<a href="' + showPageUrl + '" class="result-link response-class">' +
                                        '<p><strong>ID:</strong> ' + result.id +
                                        '<br>' +
                                        '<strong>Title:</strong> ' + result.title +
                                        '<br>' +
                                        '<strong>Salary:</strong> ' + result
                                        .salary + '<br>' +
                                        '<strong>skill:</strong> ' +
                                        result
                                        .skill + '<br>' +
                                        '<strong>Experience:</strong> ' + result.experience +
                                        '<br>' + '<strong>Location:</strong> ' + result.location +
                                        '<br>' + '<strong>Job Type:</strong> ' + result.employment_type +
                                        '<br>' + '<strong>description:</strong> ' + result.description +
                                        '<br>' + '<strong>location:</strong> ' + result.location +
                                        '</p >' +
                                        '</a>');
                                });
                            } else {
                                $('#searchResults').html('<p>No results found.</p>');
                            }

                            // Show the modal
                            $('#exampleModal').modal('show');
                        },
                        error: function(error) {
                            console.log('Error: sub eroor he ');
                            console.error('Error:', error);
                        }
                    });
                }
            });
        });

</script>