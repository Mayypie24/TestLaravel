@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laporan Pendapatan</h2>
    <h4>Total Pendapatan: Rp{{ number_format($pendapatan, 2, ',', '.') }}</h4>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Jenis Transaksi</th>
                <th>Barang/Layanan</th>
                <th>Harga Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jenis_transaksi }}</td>
                <td>
                    @if($item->jenis_transaksi === 'barang')
                        {{ $item->barang->nama_barang ?? '-' }}
                    @else
                        {{ $item->layanan->nama_layanan ?? '-' }}
                    @endif
                </td>
                <td>Rp{{ number_format($item->harga_total, 2, ',', '.') }}</td>
                <td>{{ $item->tanggal_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
