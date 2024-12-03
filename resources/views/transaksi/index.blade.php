@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Kelola Transaksi</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tab Pilihan Barang dan Layanan -->
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" id="barang-tab" data-bs-toggle="pill" href="#barang">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="layanan-tab" data-bs-toggle="pill" href="#layanan">Layanan</a>
      </li>
    </ul>

    <!-- Isi Tab -->
    <div class="tab-content mt-3">
      <!-- Tab Barang -->
    <!-- Tabel Barang -->
    <div class="mb-3 mt-4">
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
                            <button class="btn btn-success btn-sm"
                                    onclick="openAddTransactionForm('{{ $b->id_barang }}', '{{ $b->nama_barang }}', {{ $b->harga_barang }})"
                                    {{ $b->stok_barang > 0 ? '' : 'disabled' }}>
                                <i class="fas fa-plus"></i> +
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


      <!-- Tab Layanan -->
      <div class="tab-pane fade" id="layanan">
        <h4>Pilih Layanan</h4>
        <select class="form-select" id="pilih-layanan">
          <option value="">Pilih Layanan</option>
          @foreach ($layanan as $item)
              <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
          @endforeach
        </select>
        <div id="layanan-detail" class="mt-3" style="display:none;">
          <h5>Daftar Layanan:</h5>
          <ul>
            @foreach ($layanan as $item)
              <li>{{ $item->nama_layanan }} - Rp. {{ number_format($item->harga_layanan, 0, ',', '.') }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>


    </div>

    <!-- Modal Tambah Transaksi -->
    <div id="form-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center; z-index: 9999;">
        <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); width: 500px; max-width: 90%; text-align: center;">
            <!-- Form Tambah Transaksi -->
            <div id="form-transaksi">
                <h3 style="color: #333; margin-bottom: 20px;">Tambah Transaksi</h3>
                <form>
                    <div style="margin-bottom: 15px; text-align: left;">
                        <label for="nama_pelanggan" style="font-weight: bold;">Nama Pelanggan:</label>
                        <input type="text" id="nama_pelanggan" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
                    </div>
                    <div style="margin-bottom: 15px; text-align: left;">
                        <label for="no_plat" style="font-weight: bold;">No Plat:</label>
                        <input type="text" id="no_plat" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
                    </div>
                    <div style="margin-bottom: 15px; text-align: left;">
                        <label for="nama_barang" style="font-weight: bold;">Nama Barang:</label>
                        <input type="text" id="nama_barang" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" readonly>
                    </div>
                    <div style="margin-bottom: 15px; text-align: left;">
                        <label for="jumlah" style="font-weight: bold;">Jumlah:</label>
                        <input type="number" id="jumlah" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
                    </div>
                    <div style="display: flex; justify-content: space-between; gap: 10px;">
                        <button type="button" class="btn btn-primary" id="simpan-transaksi" style="flex: 1; background-color: #007bff; color: #fff; border: none; padding: 10px; border-radius: 5px;">Simpan</button>
                        <button type="button" class="btn btn-secondary" onclick="closeModal()" style="flex: 1; background-color: #6c757d; color: #fff; border: none; padding: 10px; border-radius: 5px;">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript untuk menampilkan detail setelah memilih barang atau layanan
    document.getElementById('pilih-barang').addEventListener('change', function () {
        var selectedBarang = this.value;
        if (selectedBarang) {
            document.getElementById('barang-detail').style.display = 'block';
        } else {
            document.getElementById('barang-detail').style.display = 'none';
        }
    });

    document.getElementById('pilih-layanan').addEventListener('change', function () {
        var selectedLayanan = this.value;
        if (selectedLayanan) {
            document.getElementById('layanan-detail').style.display = 'block';
        } else {
            document.getElementById('layanan-detail').style.display = 'none';
        }
    });


// Hitung Total Harga Berdasarkan Jumlah
document.getElementById('jumlah').addEventListener('input', function () {
    const jumlah = parseInt(this.value);
    const tombol = document.getElementById('tambah-transaksi-{{ $b->id_barang }}');

    if (jumlah && jumlah > 0) {
        tombol.disabled = false;  // Enable tombol jika jumlah valid
    } else {
        tombol.disabled = true;   // Disable tombol jika jumlah tidak valid
    }
});


      // Buka Form Tambah Transaksi
      function openAddTransactionForm(id, nama, harga) {
    document.getElementById('nama_barang').value = nama;
    document.getElementById('jumlah').value = '';
    document.getElementById('nama_barang').dataset.harga = harga;
    document.getElementById('form-modal').style.display = 'block';
    document.getElementById('form-transaksi').style.display = 'block';
    document.getElementById('detail-pembayaran').style.display = 'none';
    document.getElementById('sukses-transaksi').style.display = 'none';
}

    // Tutup Modal
    function closeModal() {
        document.getElementById('form-modal').style.display = 'none';
    }

    // Simpan Transaksi dan Tampilkan Form Pembayaran
    document.getElementById('simpan-transaksi').addEventListener('click', function () {
        const namaPelanggan = document.getElementById('nama_pelanggan').value;
        const noPlat = document.getElementById('no_plat').value;
        const jumlah = document.getElementById('jumlah').value;

        if (!namaPelanggan || !noPlat || !jumlah) {
            alert('Harap lengkapi semua data!');
            return;
        }

        document.getElementById('form-transaksi').style.display = 'none';
        document.getElementById('detail-pembayaran').style.display = 'block';
    });

    // Hitung Kembalian
    document.getElementById('bayar').addEventListener('input', function () {
        const totalPembayaran = 50000; // Total harga barang (sesuaikan logika perhitungan)
        const bayar = parseInt(this.value) || 0;
        const kembalian = bayar - totalPembayaran;
        document.getElementById('kembalian').value = kembalian > 0 ? kembalian : 0;
    });

    // Lanjutkan ke Sukses Transaksi
    document.getElementById('lanjutkan').addEventListener('click', function () {
        document.getElementById('detail-pembayaran').style.display = 'none';
        document.getElementById('sukses-transaksi').style.display = 'block';
    });

    // Redirect ke Dashboard
    document.getElementById('lanjutkan-dashboard').addEventListener('click', function () {
        window.location.href = '/transaksi/daftar'; // Ganti dengan URL dashboard
    });
    
    function toggleSubMenu() {
        const submenu = document.getElementById('submenu');
        const submenuIcon = document.getElementById('submenu-icon');
    
        if (submenu.style.display === 'none' || submenu.style.display === '') {
            submenu.style.display = 'block';
            submenuIcon.classList.remove('fa-chevron-right');
            submenuIcon.classList.add('fa-chevron-down');
        } else {
            submenu.style.display = 'none';
            submenuIcon.classList.remove('fa-chevron-down');
            submenuIcon.classList.add('fa-chevron-right');
        }
    }

    

</script>

<!-- Sidebar -->
<aside 
    style=" 
        width: 250px; 
        background-color: #343a40; 
        color: white; 
        height: 100vh; 
        padding: 20px; 
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); 
        position: fixed; 
        top: 0; 
        left: 0;
    ">
    <div style="text-align: center; margin-bottom: 20px;">
        <img 
            src="{{ asset('images/logo-sinar-baru-motor.jpg') }}" 
            alt="Logo Bengkel" 
            style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
    </div>

    <nav>
        <a href="{{ route('dashboard.index') }}" 
            style="color: white; padding: 15px; text-decoration: none; display: block; margin-bottom: 10px; border-radius: 5px; transition: background-color 0.3s;">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <div style="margin-bottom: 10px;">
            <a href="#" onclick="toggleSubMenu()" 
                style="color: white; padding: 15px; text-decoration: none; display: block; border-radius: 5px; cursor: pointer; transition: background-color 0.3s; display: flex; justify-content: space-between; align-items: center;">
                <span><i class="fas fa-folder"></i> Master Data</span>
                <i class="fas fa-chevron-right" id="submenu-icon"></i>
            </a>
            <div id="submenu" style="display: none; padding-left: 20px;">
                <a href="{{ route('barang.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Barang</a>
                <a href="{{ route('layanan.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Layanan</a>
                <a href="{{ route('pelanggan.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Pelanggan</a>
            </div>
        </div>

        <!-- Menambahkan menu Transaksi -->
        <a href="{{ route('transaksi.index') }}" 
            style="color: white; padding: 15px; text-decoration: none; display: block; margin-bottom: 10px; border-radius: 5px; transition: background-color 0.3s;">
            <i class="fas fa-credit-card"></i> Transaksi
        </a>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Sistem Bengkel</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="https://wa.me/62887435414960?text=Halo%20admin,%20saya%20ingin%20bertanya" target="_blank" class="btn btn-success">
                        Hubungi via WhatsApp
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</aside>
@endsection
