@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Pelanggan</h1>

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
                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf

                    <!-- Nomor Plat -->
                    <div class="form-group mb-3">
                        <label for="plat_da" class="form-label">
                            <i class="fas fa-car"></i> Nomor Plat
                        </label>
                        <input type="text" class="form-control" id="plat_da" name="plat_da" placeholder="Masukkan Nomor Plat" required>
                    </div>

                    <!-- Nama Pelanggan -->
                    <div class="form-group mb-3">
                        <label for="nama_pelanggan" class="form-label">
                            <i class="fas fa-user"></i> Nama Pelanggan
                        </label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" required>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group mb-3">
                        <label for="no_tlpon" class="form-label">
                            <i class="fas fa-phone"></i> Nomor Telepon
                        </label>
                        <input type="text" class="form-control" id="no_tlpon" name="no_tlpon" placeholder="Masukkan Nomor Telepon" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Pelanggan
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function formatPlatNomor(input) {
            // Mengubah semua huruf menjadi huruf besar
            input.value = input.value.toUpperCase();
        }

        function validateForm() {
            const platDA = document.getElementById('plat_da').value;
            const namaPelanggan = document.getElementById('nama_pelanggan').value;
            const teleponPelanggan = document.getElementById('no_tlpon').value;

            if (!platDA || !namaPelanggan || !teleponPelanggan) {
                alert('Semua field wajib diisi!');
                return false;
            }

            // Validasi plat DA (hanya huruf besar dan angka)
            if (!/^[A-Z0-9\s]+$/.test(platDA)) {
                alert('Plat DA hanya boleh berisi huruf besar, angka, dan spasi.');
                return false;
            }

            // Validasi nomor telepon (minimal 10 digit dan hanya angka)
            if (teleponPelanggan.length < 10 || isNaN(teleponPelanggan)) {
                alert('Nomor telepon harus terdiri dari minimal 10 digit angka.');
                return false;
            }

            return true;
        }
    </script>
@endsection
