@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="container" 
    style=" 
        max-width: 800px; 
        margin-top: 40px; 
        background-color: #f8f9fa; 
        border-radius: 8px; 
        padding: 40px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    ">
    <h1 
        class="mb-4" 
        style=" 
            text-align: center; 
            font-size: 28px; 
            color: #333;
        ">
        Edit Pelanggan
    </h1>

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Request untuk update data -->

        <div class="form-group mb-4">
            <label for="nama" style="font-weight: bold;">Nama Pelanggan</label>
            <input 
                type="text" 
                class="form-control" 
                id="nama" 
                name="nama_pelanggan" 
                value="{{ $pelanggan->nama_pelanggan }}" 
                placeholder="Masukkan nama pelanggan" 
                required>
        </div>
        <div class="form-group mb-4">
            <label for="email" style="font-weight: bold;">Email</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                value="{{ $pelanggan->email }}" 
                placeholder="Masukkan email pelanggan" 
                required>
        </div>
        <div class="form-group mb-4">
            <label for="telepon" style="font-weight: bold;">Telepon</label>
            <input 
                type="text" 
                class="form-control" 
                id="telepon" 
                name="telepon" 
                value="{{ $pelanggan->telepon }}" 
                placeholder="Masukkan nomor telepon pelanggan" 
                required>
        </div>
        <div class="form-group mb-4">
            <label for="alamat" style="font-weight: bold;">Alamat</label>
            <textarea 
                class="form-control" 
                id="alamat" 
                name="alamat" 
                rows="3" 
                placeholder="Masukkan alamat pelanggan" 
                required>{{ $pelanggan->alamat }}</textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" 
                class="btn btn-success" 
                style="padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                Perbarui
            </button>
                        <a href="{{ route('pelanggan.index') }}" 
                class="btn btn-secondary" 
                style="padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
