@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laporan Keluhan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pelanggan</th>
                <th>Deskripsi Keluhan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keluhan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->deskripsi_keluhan }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
