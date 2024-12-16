@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <!-- Jenis Transaksi -->
        <div class="form-group">
            <label for="jenis_transaksi">Jenis Transaksi</label>
            <select name="jenis_transaksi" id="jenis_transaksi" class="form-control" required>
                <option value="">Pilih Jenis Transaksi</option>
                <option value="barang">Barang</option>
                <option value="layanan">Layanan</option>
            </select>
        </div>

        <!-- Barang -->
        <div id="barang_fields" style="display: none;">
            <div class="form-group">
                <label for="id_barang">Barang</label>
                <select name="id_barang" id="id_barang" class="form-control">
                    <option value="">Pilih Barang</option>
                    @foreach($barang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control">
            </div>
        </div>

        <!-- Layanan -->
        <div id="layanan_fields" style="display: none;">
            <div class="form-group">
                <label for="id_layanan">Layanan</label>
                <select name="id_layanan" id="id_layanan" class="form-control">
                    <option value="">Pilih Layanan</option>
                    @foreach($layanan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Harga Total -->
        <div class="form-group">
            <label for="harga_total">Harga Total</label>
            <input type="text" name="harga_total" class="form-control" required>
        </div>

        <!-- Tanggal Transaksi -->
        <div class="form-group">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
document.getElementById('jenis_transaksi').addEventListener('change', function() {
    let jenis = this.value;
    document.getElementById('barang_fields').style.display = (jenis === 'barang') ? 'block' : 'none';
    document.getElementById('layanan_fields').style.display = (jenis === 'layanan') ? 'block' : 'none';
});
</script>
@endsection
