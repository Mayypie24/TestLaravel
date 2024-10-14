<!-- resources/views/layanan/create.blade.php -->
@extends('layouts.app')

@section('title', 'Tambah Layanan')

@section('content')
    <h1>Tambah Layanan</h1>

    <form action="{{ route('layanan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_layanan">Nama Layanan</label>
            <input type="text" name="nama_layanan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_layanan">Deskripsi Layanan</label>
            <textarea name="deskripsi_layanan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="harga_layanan">Harga Layanan</label>
            <input type="number" name="harga_layanan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="durasi_layanan">Durasi Layanan (menit)</label>
            <input type="number" name="durasi_layanan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Layanan</button>
    </form>
@endsection
