@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Jenis Transaksi</label>
            <select id="jenis_transaksi" name="jenis_transaksi" class="form-control" required>
                <option value="Barang">Barang</option>
                <option value="Layanan">Layanan</option>
            </select>
        </div>

        <!-- Pilih Barang -->
        <div class="mb-3" id="barang_section" style="display: none;">
            <label>Pilih Barang</label>
            <select id="id_barang" name="id_barang" class="form-control">
                <option value="">-- Pilih Barang --</option>
                @foreach ($barang as $b)
                    <option value="{{ $b->id }}" data-harga="{{ $b->harga_barang }}">
                        {{ $b->nama_barang }} - {{ $b->harga_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pilih Layanan -->
        <div class="mb-3" id="layanan_section" style="display: none;">
            <label>Pilih Layanan</label>
            <select id="id_layanan" name="id_layanan" class="form-control">
                <option value="">-- Pilih Layanan --</option>
                @foreach ($layanan as $l)
                    <option value="{{ $l->id }}" data-harga="{{ $l->harga_layanan }}">
                        {{ $l->nama_layanan }} - {{ $l->harga_layanan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Harga Satuan</label>
            <input type="text" id="harga_satuan" name="harga_satuan" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga Total</label>
            <input type="text" id="harga_total" name="harga_total" class="form-control" readonly>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jenisTransaksi = document.getElementById('jenis_transaksi');
        const idBarang = document.getElementById('id_barang');
        const idLayanan = document.getElementById('id_layanan');
        const hargaSatuan = document.getElementById('harga_satuan');
        const jumlah = document.getElementById('jumlah');
        const hargaTotal = document.getElementById('harga_total');
        const barangSection = document.getElementById('barang_section');
        const layananSection = document.getElementById('layanan_section');

        // Fungsi untuk memperbarui tampilan pilihan Barang atau Layanan
        function toggleSections() {
            if (jenisTransaksi.value === 'Barang') {
                barangSection.style.display = 'block';
                layananSection.style.display = 'none';
            } else if (jenisTransaksi.value === 'Layanan') {
                barangSection.style.display = 'none';
                layananSection.style.display = 'block';
            }
            updateHargaSatuan();
        }

        // Update harga satuan berdasarkan pilihan barang/layanan
        function updateHargaSatuan() {
            let selectedOption;
            if (jenisTransaksi.value === 'Barang') {
                selectedOption = idBarang.options[idBarang.selectedIndex];
            } else if (jenisTransaksi.value === 'Layanan') {
                selectedOption = idLayanan.options[idLayanan.selectedIndex];
            }

            const harga = selectedOption ? selectedOption.getAttribute('data-harga') : 0;
            hargaSatuan.value = harga;
            updateHargaTotal();
        }

        // Update harga total berdasarkan jumlah
        function updateHargaTotal() {
            const total = parseFloat(hargaSatuan.value || 0) * parseInt(jumlah.value || 0);
            hargaTotal.value = isNaN(total) ? 0 : total;
        }

        jenisTransaksi.addEventListener('change', toggleSections);
        idBarang.addEventListener('change', updateHargaSatuan);
        idLayanan.addEventListener('change', updateHargaSatuan);
        jumlah.addEventListener('input', updateHargaTotal);

        // Inisialisasi tampilan berdasarkan jenis transaksi awal
        toggleSections();
    });
</script>
@endsection
