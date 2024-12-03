@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

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
        Tambah Pelanggan
    </h1>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="form-group mb-4">
            <label for="nama_pelanggan" style="font-weight: bold;">Nama Pelanggan</label>
            <input 
                type="text" 
                name="nama_pelanggan" 
                id="nama_pelanggan" 
                class="form-control" 
                placeholder="Masukkan nama pelanggan" 
                required>
        </div>
        <div class="form-group mb-4">
            <label for="email" style="font-weight: bold;">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control" 
                placeholder="Masukkan email pelanggan" 
                required>
        </div>
        <div class="form-group mb-4">
            <label for="telepon" style="font-weight: bold;">Telepon</label>
            <input 
                type="text" 
                name="telepon" 
                id="telepon" 
                class="form-control" 
                placeholder="Masukkan nomor telepon pelanggan" 
                required>
        </div>
        <div class="form-group mb-4">
            <label for="alamat" style="font-weight: bold;">Alamat</label>
            <textarea 
                name="alamat" 
                id="alamat" 
                class="form-control" 
                rows="3" 
                placeholder="Masukkan alamat pelanggan" 
                required></textarea>
        </div>
        <div class="d-flex justify-content-between">

            <button type="submit" 
                class="btn btn-primary" 
                style="padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                Simpan
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
