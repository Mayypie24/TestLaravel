<form action="{{ route('barang.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Pastikan menggunakan method PUT untuk update -->

    <!-- Input fields -->
    <label for="id_barang">ID Barang:</label>
    <input type="text" id="id_barang" name="id_barang" value="{{ $barang->id_barang }}" required>

    <label for="nama_barang">Nama Barang:</label>
    <input type="text" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>

    <label for="merk_barang">Merk Barang:</label>
    <input type="text" id="merk_barang" name="merk_barang" value="{{ $barang->merk_barang }}" required>

    <label for="stok_barang">Stok Barang:</label>
    <input type="number" id="stok_barang" name="stok_barang" value="{{ $barang->stok_barang }}" required>

    <label for="harga_barang">Harga Barang:</label>
    <input type="number" id="harga_barang" name="harga_barang" value="{{ $barang->harga_barang }}" required>

    <label for="kualitas_barang">Kualitas Barang:</label>
    <input type="text" id="kualitas_barang" name="kualitas_barang" value="{{ $barang->kualitas_barang }}" required>

    <button type="submit" class="btn btn-primary">Update Barang</button>
</form>
