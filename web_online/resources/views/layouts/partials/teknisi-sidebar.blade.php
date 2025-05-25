<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teknisi.dashboard') ? 'active' : '' }}" 
           href="{{ route('teknisi.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('teknisi.orders.*') ? 'active' : '' }}" 
           href="{{ route('teknisi.orders.index') }}">
            <i class="fas fa-tasks"></i> Tugas Saya
        </a>
    </li>
</ul>