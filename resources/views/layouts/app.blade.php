<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dyAB/sPrsCu0iZZ3Q9IrAB+niIcxJ5ShRxhXfp2w1/kJH+a5LpeT90GmUe56smFgDyIl2vZ4fqNDO9lH22omcw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>

    <script>
        function togglePassword(inputId, element) {
            const inputField = document.getElementById(inputId);
            const icon = element.querySelector('i');
    
            if (inputField.type === 'password') {
                inputField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                inputField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        <!-- Sidebar -->
<aside style="width: 250px; background-color: #343a40; color: white; height: 100vh; padding: 20px; box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); position: fixed; top: 0; left: 0;">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ asset('images/logo-sinar-baru-motor.jpg') }}" alt="Logo Bengkel" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
    </div>

    <nav>
        <a href="{{ route('dashboard.index') }}" style="color: white; padding: 15px; text-decoration: none; display: block; margin-bottom: 10px; border-radius: 5px;">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <!-- Menu Master Data -->
        <div style="margin-bottom: 10px;">
            <a href="#" onclick="toggleSubMenu()" style="color: white; padding: 15px; text-decoration: none; display: block; border-radius: 5px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <span><i class="fas fa-folder"></i> Master Data</span>
                <i class="fas fa-chevron-right" id="submenu-icon"></i>
            </a>
            <div id="submenu" style="display: none; padding-left: 20px;">
                <a href="{{ route('barang.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Barang</a>
                <a href="{{ route('layanan.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Layanan</a>
                <a href="{{ route('pelanggan.index') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Kelola Pelanggan</a>
            </div>
        </div>

        <!-- Menu Transaksi -->
        <a href="{{ route('transaksi.index') }}" style="color: white; padding: 15px; text-decoration: none; display: block; margin-bottom: 10px; border-radius: 5px;">
            <i class="fas fa-credit-card"></i> Transaksi
        </a>

                <!-- Laporan -->
        <div style="margin-bottom: 10px;">
            <a href="#" onclick="toggleSubMenuLaporan()" style="color: white; padding: 15px; text-decoration: none; display: block; border-radius: 5px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
                <span><i class="fas fa-chart-line"></i> Laporan</span>
                <i class="fas fa-chevron-right" id="submenu-laporan-icon"></i>
            </a>
            <div id="submenu-laporan" style="display: none; padding-left: 20px;">
                <a href="{{ route('laporan.keluhan') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Laporan Keluhan</a>
                <a href="{{ route('laporan.pendapatan') }}" style="color: white; padding: 10px; text-decoration: none; display: block; margin-bottom: 5px; border-radius: 5px;">Laporan Pendapatan</a>
            </div>
        </div>

        <a href="{{ route('akun.index') }}" style="color: white; padding: 15px; text-decoration: none; display: block; margin-bottom: 10px; border-radius: 5px;">
            <i class="fas fa-user"></i> Akun
        </a>
    </nav>
</aside>

    </script>
    

</head>
<body>
    


    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
