@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 1200px; margin-top: 40px;">
    <h1 class="mb-4" style="text-align: center;">Transaksi</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($barang->isEmpty())
                <tr>
                    <td colspan="3" style="text-align: center;">Tidak ada barang tersedia.</td>
                </tr>
            @else
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $item->nama_barang }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <button class="btn btn-success btn-sm" onclick="openTambahTransaksiModal('{{ $item->id }}', '{{ $item->nama_barang }}', '{{ $item->harga }}')">+</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<!-- Modal Tambah Transaksi -->
<div id="tambahTransaksiModal" class="modal" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffffff; color: rgb(0, 0, 0);">
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="btn-close" aria-label="Close" onclick="closeTambahTransaksiModal()"></button>
            </div>
            <div class="modal-body">
                <form id="tambahTransaksiForm" method="POST" action="{{ route('transaksi.store') }}">
                    @csrf
                    <input type="hidden" name="barang_id" id="barang-id">
                    <div class="mb-3">
                        <label for="nama-pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama-pelanggan" name="nama_pelanggan" required>
                    </div>
                    <div class="mb-3">
                        <label for="no-plat" class="form-label">No Plat</label>
                        <input type="text" class="form-control" id="no-plat" name="no_plat" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama-barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama-barang" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="harga-barang" class="form-label">Harga Barang</label>
                        <input type="text" class="form-control" id="harga-barang" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-pembayaran" class="form-label">Jenis Pembayaran</label>
                        <select class="form-control" id="jenis-pembayaran" name="jenis_pembayaran" required>
                            <option value="tunai">Tunai</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="total-bayar" class="form-label">Total Pembayaran</label>
                        <input type="text" class="form-control" id="total-bayar" name="total_bayar" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeTambahTransaksiModal()">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openTambahTransaksiModal(id, nama, harga) {
        document.getElementById('barang-id').value = id;
        document.getElementById('nama-barang').value = nama;
        document.getElementById('harga-barang').value = `Rp ${parseInt(harga).toLocaleString('id-ID')}`;
        document.getElementById('total-bayar').value = `Rp ${parseInt(harga).toLocaleString('id-ID')}`;

        // Set pilihan pembayaran default ke "Tunai"
        document.getElementById('jenis-pembayaran').value = 'tunai';

        // Tampilkan modal
        document.getElementById('tambahTransaksiModal').style.display = 'block';
    }

    document.getElementById('jenis-pembayaran').addEventListener('change', function() {
        const harga = parseInt(document.getElementById('harga-barang').value.replace(/[^0-9]/g, '')); // Mengambil angka harga yang bersih
        const jenisPembayaran = this.value;
        let totalBayar = harga;

        if (jenisPembayaran === 'transfer') {
            totalBayar += 10000; // Misalnya ada biaya admin untuk transfer
        }

        document.getElementById('total-bayar').value = `Rp ${totalBayar.toLocaleString('id-ID')}`;
    });

    function closeTambahTransaksiModal() {
        document.getElementById('tambahTransaksiModal').style.display = 'none';
    }
</script>

@endsection
