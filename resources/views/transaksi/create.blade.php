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
                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">
                            {{ $item->nama_barang }} - Rp {{ number_format($item->harga, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Layanan -->
        <div id="layanan_fields" style="display: none;">
            <div class="form-group">
                <label for="id_layanan">Layanan</label>
                <select name="id_layanan" id="id_layanan" class="form-control">
                    <option value="">Pilih Layanan</option>
                    @foreach($layanan as $item)
                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">
                            {{ $item->nama_layanan }} - Rp {{ number_format($item->harga, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Harga Satuan & Harga Total -->
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="text" id="harga_satuan" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="harga_total">Harga Total</label>
            <input type="text" id="harga_total" name="harga_total" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const jenisTransaksi = document.getElementById('jenis_transaksi');
    const barangFields = document.getElementById('barang_fields');
    const layananFields = document.getElementById('layanan_fields');
    const hargaSatuanInput = document.getElementById('harga_satuan');
    const jumlahInput = document.getElementById('jumlah');
    const hargaTotalInput = document.getElementById('harga_total');

    // Menampilkan form berdasarkan jenis transaksi
    jenisTransaksi.addEventListener('change', function () {
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

    // Event listener untuk barang
    document.getElementById('id_barang').addEventListener('change', function () {
        const hargaSatuan = parseFloat(this.options[this.selectedIndex].dataset.harga);
        if (!isNaN(hargaSatuan) && hargaSatuan > 0) {
            hargaSatuanInput.value = hargaSatuan.toFixed(2);
        } else {
            hargaSatuanInput.value = '0';
        }
        hitungTotal();
    });

    // Event listener untuk layanan
    document.getElementById('id_layanan').addEventListener('change', function () {
        const hargaSatuan = parseFloat(this.options[this.selectedIndex].dataset.harga);
        if (!isNaN(hargaSatuan) && hargaSatuan > 0) {
            hargaSatuanInput.value = hargaSatuan.toFixed(2);
        } else {
            hargaSatuanInput.value = '0';
        }
        hitungTotal();
    });

    // Menghitung total
    jumlahInput.addEventListener('input', hitungTotal);

    function hitungTotal() {
        const hargaSatuan = parseFloat(hargaSatuanInput.value) || 0;
        const jumlah = parseInt(jumlahInput.value) || 0;

        if (hargaSatuan > 0 && jumlah > 0) {
            hargaTotalInput.value = (hargaSatuan * jumlah).toFixed(2);
        } else {
            hargaTotalInput.value = '0';
        }
    }
});

</script>
@endsection
