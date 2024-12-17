@extends('layouts.app')

@section('content')
<div id="layoutSidenav">
<!-- Sidebar -->
<aside 
    style="
        width: 250px;
        background-color: #343a40;
        color: white;
        height: 100vh;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        left: 0;
    ">
    <!-- Logo -->
    <div 
        style="
            text-align: center;
            margin-bottom: 20px;
        ">
        <img 
            src="{{ asset('images/logo-sinar-baru-motor.jpg') }}" 
            alt="Logo Bengkel" 
            style="
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover;
            ">
        <h2 
            style="
                margin-top: 10px;
                font-size: 18px;
                color: white;
            ">
            Bengkel Sinar Baru Motor
        </h2>
    </div>

    <!-- Menu -->
    <nav>
<!-- Dashboard -->
<a 
    href="{{ route('dashboard.index') }}" 
    style=" 
        color: white;
        padding: 15px;
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
        background-color: {{ request()->routeIs('dashboard.index') ? '#007bff' : 'transparent' }};
    ">
    <i class="fas fa-tachometer-alt"></i> Dashboard
</a>

<!-- Master Data -->
<div style="margin-bottom: 10px;">
    <a 
        href="#" 
        onclick="toggleSubMenu()" 
        style=" 
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? '#007bff' : 'transparent' }};
        ">
        <span>
            <i class="fas fa-database"></i> Master Data
        </span>
        <i class="fas {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? 'fa-chevron-down' : 'fa-chevron-right' }}" id="submenu-icon"></i>
    </a>
    <div id="submenu" style="display: {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? 'block' : 'none' }}; padding-left: 20px;">
        <a 
            href="{{ route('barang.index') }}" 
            style=" 
                color: white;
                padding: 10px;
                text-decoration: none;
                display: block;
                margin-bottom: 5px;
                border-radius: 5px;
                transition: background-color 0.3s;
                background-color: {{ request()->routeIs('barang.index') ? '#ccc' : 'transparent' }};
            ">
            <i class="fas fa-box"></i> Kelola Barang
        </a>
        <a 
            href="{{ route('layanan.index') }}" 
            style=" 
                color: white;
                padding: 10px;
                text-decoration: none;
                display: block;
                margin-bottom: 5px;
                border-radius: 5px;
                transition: background-color 0.3s;
                background-color: {{ request()->routeIs('layanan.index') ? '#ccc' : 'transparent' }};
            ">
            <i class="fas fa-cogs"></i> Kelola Layanan
        </a>
        <a 
            href="{{ route('pelanggan.index') }}" 
            style=" 
                color: white;
                padding: 10px;
                text-decoration: none;
                display: block;
                margin-bottom: 5px;
                border-radius: 5px;
                transition: background-color 0.3s;
                background-color: {{ request()->routeIs('pelanggan.index') ? '#ccc' : 'transparent' }};
            ">
            <i class="fas fa-users"></i> Kelola Pelanggan
        </a>
        <a 
            href="{{ route('montir.index') }}" 
            style=" 
                color: white;
                padding: 10px;
                text-decoration: none;
                display: block;
                margin-bottom: 5px;
                border-radius: 5px;
                transition: background-color 0.3s;
                background-color: {{ request()->routeIs('montir.index') ? '#ccc' : 'transparent' }};
            ">
            <i class="fas fa-user-cog"></i> Kelola Karyawan
        </a>
    </div>
</div>

<!-- Transaksi -->
<a 
    href="{{ route('transaksi.index') }}" 
    style=" 
        color: white;
        padding: 15px;
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
        background-color: {{ request()->routeIs('transaksi.index') ? '#007bff' : 'transparent' }};
    ">
    <i class="fas fa-shopping-cart"></i> Transaksi
</a>

<!-- Hubungi via WhatsApp -->
<a 
    href="https://wa.me/62887435414960?text=Halo%20admin,%20saya%20ingin%20bertanya%20mengenai%20layanan%20bengkel" 
    target="_blank" 
    style=" 
        color: white;
        padding: 15px;
        text-decoration: none;
        display: block;
        margin-top: 20px;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s;
        background-color: #25d366;
    ">
    <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
</a>

    </nav>
</aside>


</aside>
    <main 
        style="
            margin-left: 250px;
            padding: 40px;
            background-color: #f9fafb;
            min-height: calc(100vh - 60px);
        ">
        <h1 
            style="
                margin-bottom: 20px;
                color: #333;
            ">
            Dashboard Bengkel Motor
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div 
            class="content" 
            style="
                padding: 20px;
                text-align: center;
                max-width: 800px;
                width: 100%;
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            ">
            <h2>Selamat Datang di Dashboard</h2>
            <form action="/logout" method="POST">
                @csrf
                <button 
                    type="submit" 
                    style="
                        background-color: #28a745;
                        color: white;
                        padding: 15px 30px;
                        border: none;
                        border-radius: 20px;
                        font-size: 16px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                    ">
                    Log Out
                </button>
            </form>
        </div>
    </main>
    <footer 
        style="
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            height: 60px;
            position: fixed;
            bottom: 0;
            left: 250px;
            box-sizing: border-box;
        ">
        <p style="margin: 0;">&copy; 2024 Bengkel Sinar Baru Motor. Semua hak dilindungi.</p>
    </footer>
</div>
<script>
    function toggleSubMenu() {
        const submenu = document.getElementById('submenu');
        const icon = document.getElementById('submenu-icon');
        if (submenu.style.display === 'none' || submenu.style.display === '') {
            submenu.style.display = 'block';
            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-down'); 
        } else {
            submenu.style.display = 'none';
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-right'); 
        }
    }
</script>

@endsection