<!-- resources/views/layanan/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('content')
    <h1>Edit Layanan</h1>

    <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_layanan">Nama Layanan</label>
            <input type="text" name="nama_layanan" class="form-control" value="{{ $layanan->nama_layanan }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_layanan">Deskripsi Layanan</label>
            <textarea name="deskripsi_layanan" class="form-control" required>{{ $layanan->deskripsi_layanan }}</textarea>
        </div>
        <div class="form-group">
            <label for="harga_layanan">Harga Layanan</label>
            <input type="number" name="harga_layanan" class="form-control" value="{{ $layanan->harga_layanan }}" required>
        </div>
        <div class="form-group">
            <label for="durasi_layanan">Durasi Layanan (menit)</label>
            <input type="number" name="durasi_layanan" class="form-control" value="{{ $layanan->durasi_layanan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Layanan</button>
    </form>
@endsection
