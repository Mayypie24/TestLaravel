@extends('layouts.app')

@section('content')
    <h1>Daftar Barang Terbaik</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kualitas</th>
                <th>Total Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sortedBarang as $barang)
                <tr>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->stok_barang }}</td>
                    <td>{{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                    <td>{{ $barang->kualitas_barang }}</td>
                    <td>{{ number_format($barang->total_score, 3) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
