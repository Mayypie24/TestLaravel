<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Warna putih */
        }
        .table-container {
            max-width: 900px;
            margin: auto;
        }
        h1 {
            color: #002855; /* Biru tua */
            font-weight: bold;
        }
        .table thead {
            background-color: #002855; /* Biru tua */
            color: #fff; /* Warna tulisan putih */
        }
        .btn-primary {
            background-color: #002855; /* Tombol biru tua */
            border-color: #002855;
        }
        .btn-primary:hover {
            background-color: #00509e; /* Biru sedikit lebih cerah */
            border-color: #00509e;
        }
        aside {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
        }
        aside nav a {
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        aside nav a:hover {
            background-color: #495057;
        }
        aside nav .submenu {
            display: none;
            padding-left: 20px;
        }
        aside nav .submenu a {
            padding: 10px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="table-container">
        <h1 class="text-center mb-4">Daftar Pelanggan</h1>
        <div class="mb-3 text-start">
            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary rounded">Tambah Pelanggan</a>
        </div>
        <div class="card p-4 shadow-sm rounded border-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggans as $item)
                        <tr>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->no_tlpon }}</td>
                            <td>{{ $item->alamat_pelanggan }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('pelanggan.edit', $item->id_pelanggan) }}" class="btn btn-sm btn-warning rounded">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $item->id_pelanggan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data pelanggan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar -->
<aside>
    <div style="text-align: center; margin-bottom: 20px;">
        <img 
            src="{{ asset('images/logo-sinar-baru-motor.jpg') }}" 
            alt="Logo Bengkel" 
            style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
    </div>

    <nav>
        <a href="{{ route('dashboard.index') }}">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="#" onclick="toggleSubMenu(event, 'masterDataSubMenu')">
            <i class="fas fa-folder"></i> Master Data
            <i class="fas fa-chevron-down float-end"></i>
        </a>
        <div id="masterDataSubMenu" class="submenu">
            <a href="{{ route('barang.index') }}">Kelola Barang</a>
            <a href="{{ route('layanan.index') }}">Kelola Layanan</a>
            <a href="{{ route('pelanggan.index') }}">Kelola Pelanggan</a>
            <a 
                href="{{ route('montir.index') }}" 
                style=" 
                    color: white;
                    padding: 10px;
                    text-decoration: none;
                    display: block;
                    margin-bottom: 5px;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                    background-color: {{ request()->routeIs('montir.index') ? '#ccc' : 'transparent' }};
                ">
                Kelola Karyawan
            </a>
        </div>

        <a href="{{ route('transaksi.index') }}">
            <i class="fas fa-credit-card"></i> Transaksi
        </a>
    </nav>
</aside>

<script>
    function toggleSubMenu(event, submenuId) {
        event.preventDefault();
        const submenu = document.getElementById(submenuId);
        if (submenu.style.display === "block") {
            submenu.style.display = "none";
        } else {
            submenu.style.display = "block";
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
