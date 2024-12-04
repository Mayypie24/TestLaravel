<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
</head>
<body>
    <h1>Edit Pelanggan</h1>
    <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="no_tlpon" class="form-label">No. Telepon</label>
            <input type="text" id="no_tlpon" name="no_tlpon" value="{{ old('no_tlpon', $pelanggan->no_tlpon) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat_pelanggan" class="form-label">Alamat</label>
            <textarea id="alamat_pelanggan" name="alamat_pelanggan" class="form-control" required>{{ old('alamat_pelanggan', $pelanggan->alamat_pelanggan) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
    
</body>
</html>
