@extends('layouts.app')

@section('content')
    <h1>Kelola Layanan</h1>
    <a href="{{ route('layanan.create') }}" class="btn btn-primary">Tambah Layanan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th> <!-- Tambahan Kolom Nomor Urut -->
                <th>Nama Layanan</th>
                <th>Deskripsi Layanan</th>
                <th>Harga Layanan</th>
                <th>Durasi Layanan (menit)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($layanan as $layanan)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Menampilkan nomor urut otomatis -->
                    <td>{{ $layanan->nama_layanan }}</td>
                    <td>{{ $layanan->deskripsi_layanan }}</td>
                    <td>{{ number_format($layanan->harga_layanan, 0, ',', '.') }}</td>
                    <td>{{ $layanan->durasi_layanan }} menit</td>
                    <td>
                        <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST" style="display:inline;">
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
