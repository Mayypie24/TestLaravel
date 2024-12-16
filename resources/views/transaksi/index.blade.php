@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>Jenis Transaksi</th>
                <th>Detail</th>
                <th>Harga Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $trx)
            <tr>
                
                <td>{{ $trx->jenis_transaksi }}</td>
                <td>
                    @if($trx->jenis_transaksi === 'barang' && $trx->barang)
                        Barang: {{ $trx->barang->nama_barang }} ({{ $trx->jumlah }})
                    @elseif($trx->jenis_transaksi === 'layanan' && $trx->layanan)
                        Layanan: {{ $trx->layanan->nama_layanan }}
                    @else
                        Tidak ada detail
                    @endif
                </td>
                <td>{{ number_format($trx->harga_total, 0, ',', '.') }}</td>
                <td>{{ $trx->tanggal_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

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
    ">
    <div style="text-align: center; margin-bottom: 20px;">
        <img 
            src="{{ asset('images/logo-sinar-baru-motor.jpg') }}" 
            alt="Logo Bengkel" 
            style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
    </div>

    <nav>
        <a href="{{ route('dashboard.index') }}" 
            style="color: white; padding: 15px; text-decoration: none; display: block; margin-bottom: 10px; border-radius: 5px; transition: background-color 0.3s;">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <div style="margin-bottom: 10px;">
            <a href="#" onclick="toggleSubMenu()" 
                style="color: white; padding: 15px; text-decoration: none; display: block; border-radius: 5px; cursor: pointer; transition: background-color 0.3s; display: flex; justify-content: space-between; align-items: center;">
                <span><i class="fas fa-folder"></i> Master Data</span>
                <i class="fas fa-chevron-right" id="submenu-icon"></i>
            </a>
            <div id="submenu" style="display: none; padding-left: 20px;">
                <a href="{{ route('barang.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Barang</a>
                <a href="{{ route('layanan.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Layanan</a>
                <a href="{{ route('pelanggan.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Pelanggan</a>
            </div>
        </div>

        <!-- Menambahkan menu Transaksi -->
        <a href="{{ route('transaksi.index') }}" 
            style="color: white; padding: 15px; text-decoration: none; display: block; margin-bottom: 10px; border-radius: 5px; transition: background-color 0.3s;">
            <i class="fas fa-credit-card"></i> Transaksi
        </a>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Sistem Bengkel</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="https://wa.me/62887435414960?text=Halo%20admin,%20saya%20ingin%20bertanya" target="_blank" class="btn btn-success">
                        Hubungi via WhatsApp
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</aside>
@endsection
