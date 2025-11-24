<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="btn btn-link sidebar-toggle">
            <i class="bx bx-menu"></i>
        </button>

        <div class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="DiArsip" height="32">
            <img src="{{ asset('images/logo.svg') }}" alt="DiArsip" height="32">
        </div>

        <div class="ms-auto d-flex align-items-center">
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                    <i class="bx bx-user-circle fs-5"></i>
                    <span class="ms-2">{{ Auth::user()->name ?? 'Admin' }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bx bx-cog me-2"></i> Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>