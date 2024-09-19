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
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                <i class="lni lni-home"></i>
                <span>Home</span>
            </a>
        </li>
       
        

        <li class="sidebar-item">
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
    </ul>
    <div class="sidebar-footer">
        <a href="#" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>