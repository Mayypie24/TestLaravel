@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Pelanggan</h1>

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
                <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Plat Da -->
<div class="form-group mb-3">
    <label for="plat_da" class="form-label">
        <i class="fas fa-car"></i> Plat Da
    </label>
    <p>{{ $pelanggan->plat_da }}</p>  <!-- Display plat_da as a text -->
</div>


                    <!-- Nama Pelanggan -->
                    <div class="form-group mb-3">
                        <label for="nama_pelanggan" class="form-label">
                            <i class="fas fa-user"></i> Nama Pelanggan
                        </label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>
                    </div>

                    <!-- No. Telepon -->
                    <div class="form-group mb-3">
                        <label for="no_tlpon" class="form-label">
                            <i class="fas fa-phone-alt"></i> No. Telepon
                        </label>
                        <input type="text" class="form-control" id="no_tlpon" name="no_tlpon" value="{{ old('no_tlpon', $pelanggan->no_tlpon) }}" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
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
@endsection
