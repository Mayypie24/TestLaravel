<!-- resources/views/barang/create.blade.php -->
@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <h1>Tambah Barang</h1>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_barang">ID Barang</label>
            <input type="text" class="form-control" id="id_barang" name="id_barang" required>
        </div>
    
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        </div>

        <div class="form-group">
            <label for="merk_barang">Merk Barang</label>
            <input type="text" class="form-control" id="merk_barang" name="merk_barang" required>
        </div>

        <div class="form-group">
            <label for="stok_barang">Stok Barang</label>
            <input type="number" class="form-control" id="stok_barang" name="stok_barang" required>
        </div>

        <div class="form-group">
            <label for="harga_barang">Harga Barang</label>
            <input type="number" class="form-control" id="harga_barang" name="harga_barang" required>
        </div>

        <div class="form-group">
            <label for="kualitas_barang">Kualitas Barang</label>
            <input type="text" class="form-control" id="kualitas_barang" name="kualitas_barang" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Barang</button>
    </form>
@endsection

