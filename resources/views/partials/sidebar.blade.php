<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if (auth()->user()->role == \App\Models\User::ROLE_USER)
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">User Demo Menu</span>
            </a>
        </li>
        @endif

        @if (auth()->user()->role == \App\Models\User::ROLE_LIBRARIAN)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="ti-user menu-icon"></i>
                    <span class="menu-title">Users Management</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
