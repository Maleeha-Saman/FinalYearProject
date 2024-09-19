<nav class="row navbar navbar-expand py-3 mx-0">
    <div class="col-1">

    </div>
    <div id="searchId" class="col-4 d-none d-md-block  p-0">
        <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-primary btn-lg" type="submit">
                    <i class="fa fa-search"></i>
                </button>
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
                    <li><a class="dropdown-item" href="{{ route('employer.profile') }}"><i class="lni lni-user"></i>
                            <span>profile</span></a></li>
                    <li>
                    <li><a class="dropdown-item" href="{{ route('employer.changePassword') }}">
                        <i class="lni lni-key"></i>
                        <span>Change Password</span></a></li>
                    <li>
                        <form action="{{ route('employer.logout.custom') }}" method="POST">
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
