@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Transaksi</h1>

    <!-- Informasi Bengkel -->
    <div style="text-align: center; margin-bottom: 20px;">
        <h3>Bengkel Sinar Baru Motor</h3>
        <p>Alamat: Jl. Raya No. 123, Kota Motor</p>
        <p>Nomor Pemilik: 0812-3456-7890</p>
    </div>

    <!-- Tabel untuk menampilkan detail transaksi -->
    <table class="table table-bordered">
        <tr>
            <th>Jenis Transaksi</th>
            <td>{{ $transaksi->jenis_transaksi }}</td>
        </tr>
        <tr>
            <th>Nama Barang / Layanan</th>
            <td>{{ $transaksi->barang ? $transaksi->barang->nama_barang : $transaksi->layanan->nama_layanan }}</td>
        </tr>
        <tr>
            <th>Harga Satuan</th>
            <td>{{ number_format($transaksi->harga_satuan, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $transaksi->jumlah }}</td>
        </tr>
        <tr>
            <th>Harga Total</th>
            <td>{{ number_format($transaksi->harga_total, 0, ',', '.') }}</td>
        </tr>
    </table>

    <!-- Menampilkan Tanggal Transaksi -->
    <div style="text-align: center; margin-top: 20px;">
        <p>Tanggal Transaksi: {{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
    </div>

    <!-- Tombol Lihat dan Cetak -->
    <div class="d-flex justify-content-between mt-3">
        <!-- Tombol Lihat -->
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>

        <!-- Tombol Cetak -->
        <a href="{{ route('transaksi.cetak', $transaksi->id) }}" class="btn btn-primary" target="_blank">Cetak</a>
    </div>
</div>
@endsection
