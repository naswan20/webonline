<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
           href="{{ route('admin.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
           href="{{ route('admin.users.index') }}">
            <i class="fas fa-users"></i> Kelola Pengguna
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" 
           href="{{ route('admin.services.index') }}">
            <i class="fas fa-cogs"></i> Kelola Layanan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" 
           href="{{ route('admin.orders.index') }}">
            <i class="fas fa-clipboard-list"></i> Kelola Pesanan
        </a>
    </li>
</ul>