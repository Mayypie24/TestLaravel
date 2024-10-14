<!-- resources/views/barang/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Kelola Barang</h1>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Barang</th> <!-- Tambahan Kolom ID Barang -->
                <th>Nama</th>
                <th>Merk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kualitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $barang)
                <tr>
                    <td>{{ $barang->id_barang }}</td> <!-- Menampilkan ID Barang -->
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->merk_barang }}</td>
                    <td>{{ $barang->stok_barang }}</td>
                    <td>{{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                    <td>{{ $barang->kualitas_barang }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
