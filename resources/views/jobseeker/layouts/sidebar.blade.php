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
            <a href="{{ route('jobseeker.dashboard') }}" class="sidebar-link">
                <i class="lni lni-home"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="{{ route('jobseeker.job.applied') }}" class="sidebar-link">
                <i class="lni lni-layers"></i>
                <span>Applid Job</span>
            </a>
        </li>
    </ul> 
    <div class="sidebar-footer">
        <a href="#" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>