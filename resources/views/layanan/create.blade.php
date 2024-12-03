@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Layanan</h1>

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
                <form action="{{ route('layanan.store') }}" method="POST">
                    @csrf

                    <!-- Nama Layanan -->
                    <div class="form-group mb-3">
                        <label for="nama_layanan" class="form-label">
                            <i class="fas fa-concierge-bell"></i> Nama Layanan
                        </label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Masukkan Nama Layanan" required>
                    </div>

                    <!-- Deskripsi Layanan -->
                    <div class="form-group mb-3">
                        <label for="deskripsi_layanan" class="form-label">
                            <i class="fas fa-align-left"></i> Deskripsi Layanan
                        </label>
                        <textarea class="form-control" id="deskripsi_layanan" name="deskripsi_layanan" rows="3" placeholder="Masukkan Deskripsi Layanan"></textarea>
                    </div>

                    <!-- Harga Layanan -->
                    <div class="form-group mb-3">
                        <label for="harga_layanan" class="form-label">
                            <i class="fas fa-money-bill"></i> Harga Layanan
                        </label>
                        <input type="number" class="form-control" id="harga_layanan" name="harga_layanan" placeholder="Masukkan Harga Layanan" required>
                    </div>

                    <!-- Durasi Layanan -->
                    <div class="form-group mb-4">
                        <label for="durasi_layanan" class="form-label">
                            <i class="fas fa-clock"></i> Durasi Layanan (Menit)
                        </label>
                        <input type="number" class="form-control" id="durasi_layanan" name="durasi_layanan" placeholder="Masukkan Durasi Layanan" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Layanan
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('layanan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
