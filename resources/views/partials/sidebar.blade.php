<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-smile"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin 2</div>
    </a>
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">

    
    <!-- Kelola Barang -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-cogs"></i>
            <span>Kelola Barang</span>
        </a>
    </li>

    <!-- Kelola Layanan -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('layanan.index') }}">
            <i class="fas fa-tools"></i>
            <span>Kelola Layanan</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <!-- Item lainnya bisa ditambahkan di sini -->
</ul>
