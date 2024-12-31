@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 40px;">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4">Daftar Karyawan Bengkel Sinar Baru Motor</h1>

    <div class="mb-4">
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Karyawan</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Gaji Karyawan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k)
                <tr>
                    <td>{{ $k->nama_karyawan }}</td>
                    <td>{{ $k->no_telepon }}</td>
                    <td>{{ $k->alamat }}</td>
                    <td>Rp {{ number_format($k->gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    ">

    <!-- Logo -->
    <div 
        style="text-align: center; margin-bottom: 20px;">
        <img 
            src="{{ asset('images/logo-sinar-baru-motor_2-removebg-preview.png') }}" 
            alt="Logo Bengkel" 
            style="width: 100px; height: 100px; border-radius: 20%; object-fit: cover;">
        <h2 
            style="margin-top: 10px; font-size: 18px; color: white;">
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
                transition: background-color 0.3s, padding-left 0.3s;
                background-color: {{ request()->routeIs('dashboard.index') ? '#007bff' : 'transparent' }};">
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
                    transition: background-color 0.3s, padding-left 0.3s;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    background-color: {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? '#007bff' : 'transparent' }};">
                <span>
                    <i class="fas fa-database"></i> Master Data
                </span>
                <i class="fas {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? 'fa-chevron-down' : 'fa-chevron-right' }}" id="submenu-icon"></i>
            </a>
            <div id="submenu" 
                style="display: {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? 'block' : 'none' }}; padding-left: 20px;">
                <a 
                    href="{{ route('barang.index') }}" 
                    style=" 
                        color: white;
                        padding: 10px;
                        text-decoration: none;
                        display: block;
                        margin-bottom: 5px;
                        border-radius: 5px;
                        transition: background-color 0.3s, padding-left 0.3s;
                        background-color: {{ request()->routeIs('barang.index') ? '#ccc' : 'transparent' }};">
                    <i class="fas fa-box"></i> Data Barang
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
                        transition: background-color 0.3s, padding-left 0.3s;
                        background-color: {{ request()->routeIs('layanan.index') ? '#ccc' : 'transparent' }};">
                    <i class="fas fa-cogs"></i> Layanan Perbaikan
                </a>
            </div>
        </div>

        <!-- Daftar Pelanggan -->
        <a 
            href="{{ route('pelanggan.index') }}" 
            style=" 
                color: white;
                padding: 15px;
                text-decoration: none;
                display: block;
                margin-bottom: 10px;
                border-radius: 5px;
                transition: background-color 0.3s, padding-left 0.3s;
                background-color: {{ request()->routeIs('pelanggan.index') ? '#007bff' : 'transparent' }};">
            <i class="fas fa-users"></i> Daftar Pelanggan
        </a>

        <!-- Data Karyawan -->
        <a 
            href="{{ route('karyawan.index') }}" 
            style=" 
                color: white;
                padding: 15px;
                text-decoration: none;
                display: block;
                margin-bottom: 10px;
                border-radius: 5px;
                transition: background-color 0.3s, padding-left 0.3s;
                background-color: {{ request()->routeIs('montir.index') ? '#007bff' : 'transparent' }};">
            <i class="fas fa-user-cog"></i> Data Karyawan
        </a>

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
                transition: background-color 0.3s, padding-left 0.3s;
                background-color: {{ request()->routeIs('transaksi.index') ? '#007bff' : 'transparent' }};">
            <i class="fas fa-shopping-cart"></i> Transaksi
        </a>

        <!-- Laporan Pendapatan -->
        <a 
            href="{{ route('laporan-pendapatan.index') }}" 
            style=" 
                color: white;
                padding: 15px;
                text-decoration: none;
                display: block;
                margin-bottom: 10px;
                border-radius: 5px;
                transition: background-color 0.3s, padding-left 0.3s;
                background-color: {{ request()->routeIs('laporan-pendapatan.index') ? '#007bff' : 'transparent' }};">
            <i class="fas fa-chart-line"></i> Laporan Pendapatan
        </a>
    </nav>
</aside>

<script>
    function toggleSubMenu() {
    var submenu = document.getElementById("submenu");
    var icon = document.getElementById("submenu-icon");
    
    // Jika submenu tidak ditampilkan, tampilkan submenu dan ubah ikon
    if (submenu.style.display === "none" || submenu.style.display === "") {
        submenu.style.display = "block";
        icon.classList.remove("fa-chevron-right");
        icon.classList.add("fa-chevron-down");
    } else {
        submenu.style.display = "none";
        icon.classList.remove("fa-chevron-down");
        icon.classList.add("fa-chevron-right");
    }
}


</script>
@endsection
