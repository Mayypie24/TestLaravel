@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Kelola Transaksi</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabs Barang dan Layanan -->
    <ul class="nav nav-tabs" id="tabMenu">
        <li class="nav-item">
            <a class="nav-link active" id="barang-tab" data-bs-toggle="tab" href="#barang">Barang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="layanan-tab" data-bs-toggle="tab" href="#layanan">Layanan</a>
        </li>
    </ul>

    <!-- Isi Tab -->
    <div class="tab-content mt-3">
        <!-- Tab Barang -->
        <div class="tab-pane fade show active" id="barang">
            <h3>Pilih Barang</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $b)
                        <tr>
                            <td>{{ $b->id_barang }}</td>
                            <td>{{ $b->nama_barang }}</td>
                            <td>Rp. {{ number_format($b->harga_barang, 0, ',', '.') }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="addToCart('{{ $b->id_barang }}', '{{ $b->nama_barang }}', {{ $b->harga_barang }})">
                                    Tambah
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tab Layanan -->
        <div class="tab-pane fade" id="layanan">
            <h3>Pilih Layanan</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Layanan</th>
                        <th>Nama Layanan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($layanan as $l)
                        <tr>
                            <td>{{ $l->id }}</td>
                            <td>{{ $l->nama_layanan }}</td>
                            <td>Rp. {{ number_format($l->harga_layanan, 0, ',', '.') }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="addToCart('{{ $l->id }}', '{{ $l->nama_layanan }}', {{ $l->harga_layanan }})">
                                    Tambah
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Keranjang -->
    <h3 class="mt-4">Keranjang Transaksi</h3>
    <table class="table table-bordered" id="cartTable">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Daftar barang/layanan akan ditambahkan dengan JavaScript -->
        </tbody>
    </table>
    <h4 class="text-end" id="totalHarga">Total: Rp. 0</h4>

    <!-- Form Pembayaran -->
    <h3>Form Pembayaran</h3>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="no_plat" class="form-label">No Plat</label>
            <input type="text" class="form-control" id="no_plat" name="no_plat" required>
        </div>
        <div class="mb-3">
            <label for="bayar" class="form-label">Jumlah Bayar</label>
            <input type="number" class="form-control" id="bayar" name="bayar" required>
        </div>
        <h4 class="text-end" id="kembalian">Kembalian: Rp. 0</h4>
        <button type="submit" class="btn btn-success w-100">Selesaikan Transaksi</button>
    </form>
</div>

<script>
    let cart = [];
    let totalHarga = 0;

    function addToCart(id, nama, harga) {
        const item = cart.find(i => i.id === id);
        if (item) {
            item.jumlah += 1;
            item.total = item.jumlah * harga;
        } else {
            cart.push({ id, nama, harga, jumlah: 1, total: harga });
        }
        updateCart();
    }

    function updateCart() {
        const tableBody = document.querySelector("#cartTable tbody");
        tableBody.innerHTML = '';
        totalHarga = 0;

        cart.forEach((item, index) => {
            totalHarga += item.total;
            tableBody.innerHTML += `
                <tr>
                    <td>${item.nama}</td>
                    <td>Rp. ${item.harga.toLocaleString()}</td>
                    <td>${item.jumlah}</td>
                    <td>Rp. ${item.total.toLocaleString()}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Hapus</button></td>
                </tr>
            `;
        });

        document.getElementById("totalHarga").innerText = `Total: Rp. ${totalHarga.toLocaleString()}`;
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCart();
    }

    document.getElementById('bayar').addEventListener('input', function () {
        const bayar = parseInt(this.value) || 0;
        const kembalian = bayar - totalHarga;
        document.getElementById("kembalian").innerText = `Kembalian: Rp. ${kembalian > 0 ? kembalian.toLocaleString() : 0}`;
    });
</script>
@endsection
