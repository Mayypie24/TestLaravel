<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Montir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px; /* Membatasi lebar maksimum */
            margin: auto; /* Membuat tampilan tetap di tengah */
            background-color: white; /* Menambahkan latar belakang putih */
            border-radius: 8px; /* Membuat sudut lebih halus */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            padding: 20px; /* Ruang di dalam formulir */
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Tambah Data Karyawan</h2>

        <form action="{{ route('montir.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_montir" class="form-label">Nama</label>
                <input type="text" name="nama_montir" id="nama_montir" class="form-control" placeholder="Masukkan nama karyawan" required>
            </div>

            <div class="mb-3">
                <label for="no_tlpon" class="form-label">No Telepon</label>
                <input type="text" name="no_tlpon" id="no_tlpon" class="form-control" placeholder="Masukkan nomor telepon" required>
            </div>

            <div class="mb-3">
                <label for="alamat_montir" class="form-label">Alamat</label>
                <textarea name="alamat_montir" id="alamat_montir" class="form-control" rows="3" placeholder="Masukkan alamat karyawan" required></textarea>
            </div>

            <div class="mb-3">
                <label for="gajih" class="form-label">Gaji</label>
                <input type="number" name="gajih" id="gajih" class="form-control" step="0.01" placeholder="Masukkan jumlah gaji" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('montir.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
