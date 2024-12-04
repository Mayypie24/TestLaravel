<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Warna putih */
        }
        .table-container {
            max-width: 900px;
            margin: auto;
        }
        h1 {
            color: #002855; /* Biru tua */
            font-weight: bold;
        }
        .table thead {
            background-color: #002855; /* Biru tua */
            color: #fff; /* Warna tulisan putih */
        }
        .table tbody tr {
            background-color: #ffffff; /* Putih untuk baris tabel */
            color: #000; /* Hitam untuk teks */
        }
        .btn-primary {
            background-color: #002855; /* Tombol biru tua */
            border-color: #002855;
        }
        .btn-primary:hover {
            background-color: #00509e; /* Biru sedikit lebih cerah */
            border-color: #00509e;
        }
        .btn-warning {
            color: #000; /* Hitam untuk teks tombol */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="table-container">
        <h1 class="text-center mb-4">Daftar Pelanggan</h1>

        <!-- Tambah Pelanggan Button -->
        <div class="mb-3 text-start">
            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary rounded">Tambah Pelanggan</a>
        </div>

        <!-- Tabel Daftar Pelanggan -->
        <div class="card p-4 shadow-sm rounded border-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggans as $item)
                        <tr>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->no_tlpon }}</td>
                            <td>{{ $item->alamat_pelanggan }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}" class="btn btn-sm btn-warning rounded">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $item->id_pelanggan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data pelanggan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
