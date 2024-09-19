<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">Online Bazar</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{ route('employer.dashboard') }}" class="sidebar-link">
                <i class="lni lni-home"></i>
                <span>Home</span>
            </a>
        </li>
       
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="lni lni-layers"></i>
                <span>Jobs</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('employer.joblisting.index') }}" class="sidebar-link">Job Listing</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('employer.joblisting.create') }}" class="sidebar-link">Add Job Post</a>
                </li>
            </ul>
        </li>

        {{-- <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#user" aria-expanded="false" aria-controls="user">
                <i class="lni lni-users"></i>
                <span>User Manage</span>
            </a>
            <ul id="user" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('admin.user.all') }}" class="sidebar-link">All Users</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.user.active') }}" class="sidebar-link">Acitve Users</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.user.blocked') }}" class="sidebar-link">Block Users</a>
                </li>
            </ul>
        </li>
       
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                <i class="lni lni-layout"></i>
                <span>Multi Level</span>
            </a>
            <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                        Two Links
                    </a>
                    <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Link 1</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Link 2</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="lni lni-popup"></i>
                <span>Notification</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="lni lni-cog"></i>
                <span>Setting</span>
            </a>
        </li>--}}
    </ul> 
    <div class="sidebar-footer">
        <a href="#" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>