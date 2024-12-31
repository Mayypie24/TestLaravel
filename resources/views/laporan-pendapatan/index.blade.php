@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Pendapatan</h1>

    <!-- Form untuk memilih rentang tanggal -->
    <form action="{{ route('laporan-pendapatan.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate->format('Y-m-d') }}">
            </div>
            <div class="col-md-4">
                <label for="end_date">Tanggal Selesai</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate->format('Y-m-d') }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>

    <!-- Tabel untuk menampilkan transaksi, diberi kelas printable -->
    <div class="printable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jenis Transaksi</th>
                    <th>Nama Barang / Layanan</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Harga Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item->jenis_transaksi }}</td>
                        <td>{{ $item->barang ? $item->barang->nama_barang : $item->layanan->nama_layanan }}</td>
                        <td>{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ number_format($item->harga_total, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Pendapatan, ditambahkan di dalam elemen printable -->
        <div style="text-align: right;">
            <h3>Total Pendapatan: {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
        </div>
    </div>



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


@endsection
