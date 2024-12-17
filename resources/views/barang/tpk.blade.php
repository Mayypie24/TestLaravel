@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Hasil Penentuan Barang Terbaik</h1>

    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kualitas</th>
                <th>Total Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sortedBarang as $index => $barang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->stok_barang }}</td>
                <td>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                <td>{{ $barang->kualitas_barang }}</td>
                <td>{{ number_format($barang->total_score, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
