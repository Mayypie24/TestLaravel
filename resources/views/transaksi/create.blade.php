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

<!-- Pilih Barang -->
<div id="barang_fields" style="display: none;">
    <label for="id_barang">Pilih Barang</label>
    <select id="id_barang" name="id_barang" class="form-control">
        <option value="">Pilih Barang</option>
        @foreach($barang as $item)
            <option value="{{ $item->id }}">
                {{ $item->nama_barang }} - Rp {{ number_format($item->harga_satuan, 2) }}
            </option>
        @endforeach
    </select>
</div>

<!-- Pilih Layanan -->
<div id="layanan_fields" style="display: none;">
    <label for="id_layanan">Pilih Layanan</label>
    <select id="id_layanan" name="id_layanan" class="form-control">
        <option value="">Pilih Layanan</option>
        @foreach($layanan as $item)
            <option value="{{ $item->id }}">
                {{ $item->nama_layanan }} - Rp {{ number_format($item->harga, 2) }}
            </option>
        @endforeach
    </select>
</div>


<!-- Harga Satuan -->
<div class="form-group">
    <label for="harga_satuan">Harga Satuan</label>
    <input type="text" id="harga_satuan" name="harga_satuan" class="form-control" readonly>
</div>

        <!-- Jumlah -->
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" required>
        </div>

        <!-- Harga Total -->
        <div class="form-group">
            <label for="harga_total">Harga Total</label>
            <input type="text" id="harga_total" name="harga_total" class="form-control" readonly>
        </div>

        <!-- Tanggal Transaksi -->
        <div class="form-group">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" required>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const barangFields = document.getElementById('barang_fields');
    const layananFields = document.getElementById('layanan_fields');
    const hargaSatuanInput = document.getElementById('harga_satuan');
    const jumlahInput = document.getElementById('jumlah');
    const hargaTotalInput = document.getElementById('harga_total');

    // Menampilkan form berdasarkan jenis transaksi
    document.getElementById('jenis_transaksi').addEventListener('change', function () {
        resetFields();
        if (this.value === 'barang') {
            barangFields.style.display = 'block';
            layananFields.style.display = 'none';
        } else if (this.value === 'layanan') {
            layananFields.style.display = 'block';
            barangFields.style.display = 'none';
        } else {
            barangFields.style.display = 'none';
            layananFields.style.display = 'none';
        }
    });

    // Event listener untuk Pilih Barang
    document.getElementById('id_barang').addEventListener('change', function() {
        const idBarang = this.value;

        if (idBarang) {
            fetch(`/get-harga/${idBarang}`)
                .then(response => response.json())
                .then(data => {
                    hargaSatuanInput.value = data.harga; // Masukkan harga ke input
                    hitungTotal();
                })
                .catch(error => console.log(error));
        }
    });

    // Event listener untuk Pilih Layanan
    document.getElementById('id_layanan').addEventListener('change', function() {
        const idLayanan = this.value;

        if (idLayanan) {
            fetch(`/get-harga/${idLayanan}`)
                .then(response => response.json())
                .then(data => {
                    hargaSatuanInput.value = data.harga; // Masukkan harga ke input
                    hitungTotal();
                })
                .catch(error => console.log(error));
        }
    });

    // Update harga total saat jumlah diubah
    jumlahInput.addEventListener('input', hitungTotal);

    function hitungTotal() {
        const hargaSatuan = parseFloat(hargaSatuanInput.value) || 0;
        const jumlah = parseInt(jumlahInput.value) || 0;
        hargaTotalInput.value = hargaSatuan * jumlah; // Hitung total harga
    }

    function resetFields() {
        hargaSatuanInput.value = '';
        jumlahInput.value = '';
        hargaTotalInput.value = '';
    }
});

</script>
@endsection
