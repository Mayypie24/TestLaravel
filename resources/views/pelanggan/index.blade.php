@extends('layouts.app')

@section('content')
<div class="container" 
    style=" 
        max-width: 1200px; 
        margin-top: 40px; 
        background-color: #f8f9fa; 
        border-radius: 8px; 
        padding: 40px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    ">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 
        class="mb-4" 
        style=" 
            text-align: center; 
            font-size: 28px; 
            color: #333;
        ">
        Daftar Pelanggan Bengkel Sinar Baru Motor
    </h1>

    <div style="margin-bottom: 20px;">
        <a 
            href="{{ route('pelanggan.create') }}" 
            class="btn btn-primary" 
            style="
                padding: 12px 24px; 
                font-size: 18px; 
                border-radius: 5px;
            ">
            Tambah Pelanggan
        </a>
    </div>

    <table 
        class="table table-bordered table-striped" 
        style=" 
            width: 100%; 
            background-color: white; 
            border-radius: 8px; 
            overflow: hidden;
            font-size: 16px; 
        ">
        <thead 
            style=" 
                background-color: #343a40; 
                color: white; 
                text-transform: uppercase; 
                font-weight: bold;
            ">
            <tr>
                <th style="width: 20%;">Nomor Plat</th>
                <th style="width: 25%;">Nama</th>
                <th style="width: 25%;">Nomor Telepon</th>
                <th style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $p)
            <tr>
                <td>{{ $p->plat_da }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->no_tlpon }}</td>
                <td style="text-align: center; display: flex; flex-direction: column; align-items: center; gap: 10px;">
                    @if($p->id_pelanggan)
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('pelanggan.edit', $p->id_pelanggan) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <button type="button" 
                                class="btn btn-danger btn-sm" 
                                onclick="openDeleteModal({{ $p->id_pelanggan }}, '{{ $p->nama_pelanggan }}')">
                                Hapus
                            </button>
                        </div>
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $p->no_tlpon) }}?text=Halo%20{{ urlencode($p->nama_pelanggan) }},%0A%0AKami%20dari%20Bengkel%20Sinar%20Baru%20Motor%20ingin%20memberitahukan%20bahwa%20kendaraan%20Anda%20dengan%20nomor%20plat%20{{ urlencode($p->plat_da) }}%20telah%20selesai%20diperbaiki%20dan%20sudah%20siap%20untuk%20diambil.%0A%0ASilakan%20datang%20ke%20bengkel%20kami%20di%20waktu%20yang%20Anda%20luangkan.%20Jika%20ada%20pertanyaan%20lebih%20lanjut%20atau%20membutuhkan%20bantuan%2C%20jangan%20ragu%20untuk%20menghubungi%20kami.%0A%0ATerima%20kasih%20telah%20mempercayakan%20kendaraan%20Anda%20pada%20kami.%20Kami%20selalu%20siap%20membantu%20Anda!%0A%0ASalam%20hangat%2C%0ABengkel%20Sinar%20Baru%20Motor" 
                            class="btn btn-success btn-sm" 
                            target="_blank" 
                            style="text-decoration: none; margin-top: 10px;">
                            Hubungi WhatsApp
                        </a>                        
                         
                        <form id="delete-form-{{ $p->id_pelanggan }}" action="{{ route('pelanggan.destroy', $p->id_pelanggan) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @else
                        <span class="text-danger">ID pelanggan tidak valid</span>
                    @endif
                </td>
                
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffffff; color: rgb(0, 0, 0);">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" aria-label="Close" onclick="closeDeleteModal()"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus pelanggan <strong id="modal-item-name"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-button">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
function openDeleteModal(id, name) {
    document.getElementById('modal-item-name').textContent = name;
    document.getElementById('confirm-delete-button').onclick = function () {
        document.getElementById(`delete-form-${id}`).submit();
    };
    document.getElementById('deleteModal').style.display = 'block';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
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


<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffffff; color: rgb(0, 0, 0);">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" aria-label="Close" onclick="closeDeleteModal()"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus barang <strong id="modal-item-name"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-delete-button">Oke</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
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

function confirmDelete(id) {
    const confirmation = confirm('Apakah Anda yakin ingin menghapus barang ini?');
    if (confirmation) {
        document.getElementById(`delete-form-${id}`).submit();
    }
}

function openDeleteModal(id, name) {
    document.getElementById('modal-item-name').textContent = name;
    document.getElementById('confirm-delete-button').onclick = function () {
        document.getElementById(`delete-form-${id}`).submit();
    };
    document.getElementById('deleteModal').style.display = 'block';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function formatRupiah(element) {
    let angka = element.value.replace(/\./g, ''); // Hapus semua titik
    let formatted = parseInt(angka).toLocaleString('id-ID'); // Format ulang
    element.value = formatted;
}

</script>
@endsection
