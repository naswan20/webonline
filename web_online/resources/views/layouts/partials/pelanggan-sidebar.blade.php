<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}" 
           href="{{ route('pelanggan.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('pelanggan.orders.*') ? 'active' : '' }}" 
           href="{{ route('pelanggan.orders.index') }}">
            <i class="fas fa-shopping-cart"></i> Pesanan Saya
        </a>
    </li>
</ul>