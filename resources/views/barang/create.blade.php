@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Barang</h1>

        <!-- Tampilkan error jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf

                    <!-- ID Barang -->
                    <div class="form-group mb-3">
                        <label for="id_barang" class="form-label">
                            <i class="fas fa-barcode"></i> ID Barang
                        </label>
                        <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="Masukkan ID Barang" required>
                    </div>

                    <!-- Nama Barang -->
                    <div class="form-group mb-3">
                        <label for="nama_barang" class="form-label">
                            <i class="fas fa-box"></i> Nama Barang
                        </label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" required>
                    </div>

                    <!-- Merk Barang -->
                    <div class="form-group mb-3">
                        <label for="merk_barang" class="form-label">
                            <i class="fas fa-tags"></i> Merk Barang
                        </label>
                        <input type="text" class="form-control" id="merk_barang" name="merk_barang" placeholder="Masukkan Merk Barang" required>
                    </div>

                    <!-- Stok Barang -->
                    <div class="form-group mb-3">
                        <label for="stok_barang" class="form-label">
                            <i class="fas fa-boxes"></i> Stok Barang
                        </label>
                        <input type="number" class="form-control" id="stok_barang" name="stok_barang" placeholder="Masukkan Stok Barang" required>
                    </div>

                    <!-- Harga Barang -->
                    <div class="form-group mb-3">
                        <label for="harga_barang" class="form-label">
                            <i class="fas fa-money-bill"></i> Harga Barang
                        </label>
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="Masukkan Harga Barang" required>
                    </div>

                    <!-- Kualitas Barang -->
                    <div class="form-group mb-4">
                        <label for="kualitas_barang" class="form-label">
                            <i class="fas fa-star"></i> Kualitas Barang
                        </label>
                        <input type="text" class="form-control" id="kualitas_barang" name="kualitas_barang" placeholder="Masukkan Kualitas Barang" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Barang
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
