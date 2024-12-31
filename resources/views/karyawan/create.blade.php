@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Karyawan</h1>

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
                <form action="{{ route('karyawan.store') }}" method="POST">
                    @csrf

                    <!-- Nama Karyawan -->
                    <div class="form-group mb-3">
                        <label for="nama_karyawan" class="form-label">
                            <i class="fas fa-user"></i> Nama Karyawan
                        </label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan') }}" required>
                    </div>

                    <!-- No. Telepon -->
                    <div class="form-group mb-3">
                        <label for="no_telepon" class="form-label">
                            <i class="fas fa-phone-alt"></i> No. Telepon
                        </label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" required>
                    </div>

                    <!-- Alamat -->
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Alamat
                        </label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
                    </div>

                    <!-- Gaji -->
                    <div class="form-group mb-3">
                        <label for="gaji" class="form-label">
                            <i class="fas fa-dollar-sign"></i> Gaji Karyawan
                        </label>
                        <input type="number" class="form-control" id="gaji" name="gaji" value="{{ old('gaji') }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Tambah Karyawan
                        </button>

                        <!-- Tombol Batal -->
                        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
