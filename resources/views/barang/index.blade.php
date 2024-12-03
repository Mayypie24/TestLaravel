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
        Barang Bengkel Sinar Baru Motor
    </h1>

    <div style="margin-bottom: 20px;">
        <a 
            href="{{ route('barang.create') }}" 
            class="btn btn-primary" 
            style="
                padding: 12px 24px; 
                font-size: 18px; 
                border-radius: 5px;
            ">
            Tambah Barang
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
                <th style="width: 15%;">ID Barang</th>
                <th style="width: 25%;">Nama</th>
                <th style="width: 20%;">Merk</th>
                <th style="width: 15%;">Stok</th>
                <th style="width: 20%;">Harga</th>
                <th style="width: 15%;">Kualitas</th>
                <th style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($barang as $b)
                <tr>
                    <td>{{ $b->id_barang }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->merk_barang }}</td>
                    <td>{{ $b->stok_barang }}</td>
                    <td style="text-align: right;">{{ number_format($b->harga_barang, 0, ',', '.') }}</td>
                    <td>{{ $b->kualitas_barang }}</td>
                    <td style="text-align: center; display: flex; justify-content: center; gap: 10px;">
                        <a href="{{ route('barang.edit', $b->id) }}" 
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button type="button" 
                            class="btn btn-danger btn-sm" 
                            onclick="openDeleteModal({{ $b->id }}, '{{ $b->nama_barang }}')">
                            Hapus
                        </button>
                        <form id="delete-form-{{ $b->id }}" action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data barang.</td>
                </tr>
            @endforelse
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
</script>
@endsection
