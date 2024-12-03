@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Barang</h1>

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
            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Barang -->
                <div class="form-group mb-3">
                    <label for="nama_barang" class="form-label">
                        <i class="fas fa-box"></i> Nama Barang
                    </label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
                </div>

                <!-- Merk Barang -->
                <div class="form-group mb-3">
                    <label for="merk_barang" class="form-label">
                        <i class="fas fa-tags"></i> Merk Barang
                    </label>
                    <input type="text" class="form-control" id="merk_barang" name="merk_barang" value="{{ $barang->merk_barang }}" required>
                </div>

                <!-- Stok Barang -->
                <div class="form-group mb-3">
                    <label for="stok_barang" class="form-label">
                        <i class="fas fa-boxes"></i> Stok Barang
                    </label>
                    <input type="number" class="form-control" id="stok_barang" name="stok_barang" value="{{ $barang->stok_barang }}" required>
                </div>

                <!-- Harga Barang -->
                <div class="form-group mb-3">
                    <label for="harga_barang" class="form-label">
                        <i class="fas fa-money-bill"></i> Harga Barang
                    </label>
                    <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="{{ $barang->harga_barang }}" required>
                </div>

                <!-- Kualitas Barang -->
                <div class="form-group mb-4">
                    <label for="kualitas_barang" class="form-label">
                        <i class="fas fa-star"></i> Kualitas Barang
                    </label>
                    <input type="text" class="form-control" id="kualitas_barang" name="kualitas_barang" value="{{ $barang->kualitas_barang }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
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
