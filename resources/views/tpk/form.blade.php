@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Input Data Barang dan Kriteria</h1>

    <h3>Tambah Barang</h3>
    <form action="{{ route('tpk.storeBarang') }}" method="POST">
        @csrf
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <input type="number" name="jumlah_terjual" placeholder="Jumlah Terjual" required>
        <input type="number" step="0.01" name="harga" placeholder="Harga" required>
        <input type="number" name="kualitas" placeholder="Kualitas" required>
        <button type="submit">Tambah Barang</button>
    </form>

    <h3>Tambah Kriteria</h3>
    <form action="{{ route('tpk.storeKriteria') }}" method="POST">
        @csrf
        <input type="text" name="nama_kriteria" placeholder="Nama Kriteria" required>
        <input type="number" step="0.01" name="bobot" placeholder="Bobot" required>
        <button type="submit">Tambah Kriteria</button>
    </form>
</div>
@endsection
