<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px; /* Batas lebar maksimal */
            margin: auto; /* Sentralisasi */
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="form-container">
        <h1 class="text-center mb-4">Tambah Pelanggan</h1>
        <div class="card p-4 shadow-sm">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" placeholder="Masukkan nama pelanggan" required>
                </div>
                <div class="mb-3">
                    <label for="no_tlpon" class="form-label">No. Telepon</label>
                    <input type="text" id="no_tlpon" name="no_tlpon" class="form-control" placeholder="Masukkan nomor telepon" required>
                </div>
                <div class="mb-3">
                    <label for="alamat_pelanggan" class="form-label">Alamat</label>
                    <textarea id="alamat_pelanggan" name="alamat_pelanggan" class="form-control" rows="3" placeholder="Masukkan alamat" required></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
