@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Barang</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID Barang</th>
            <td>{{ $barang->id_barang }}</td>
        </tr>
        <tr>
            <th>Nama Barang</th>
            <td>{{ $barang->nama_barang }}</td>
        </tr>
        <tr>
            <th>Merk</th>
            <td>{{ $barang->merk_barang }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $barang->stok_barang }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Kualitas</th>
            <td>{{ $barang->kualitas_barang }}</td>
        </tr>
    </table>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
