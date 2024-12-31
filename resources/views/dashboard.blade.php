@extends('layouts.app')

@section('content')
<div id="layoutSidenav">
    <!-- Sidebar -->
    <aside 
        style="
            width: 290px;
            background-color: #2f3842;
            color: white;
            height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            transition: background-color 0.3s;
        ">
        <!-- Logo -->
        <div 
            style="
                text-align: center;
                margin-bottom: 20px;
            ">
            <img 
                src="{{ asset('images/logo-sinar-baru-motor_2-removebg-preview.png') }}" 
                alt="Logo Bengkel" 
                style="
                    width: 100px;
                    height: 100px;
                    border-radius: 20%;
                    object-fit: cover;
                ">
            <h2 
                style="
                    margin-top: 10px;
                    font-size: 18px;
                    color: white;
                ">
                Bengkel Sinar Baru Motor
            </h2>
        </div>

        <!-- Menu -->
        <nav>
            <!-- Dashboard -->
            <a 
                href="{{ route('dashboard.index') }}" 
                style=" 
                    color: white;
                    padding: 15px;
                    text-decoration: none;
                    display: block;
                    margin-bottom: 10px;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                    background-color: {{ request()->routeIs('dashboard.index') ? '#007bff' : 'transparent' }};
                ">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>

            <!-- Master Data -->
            <div style="margin-bottom: 10px;">
                <a 
                    style=" 
                        color: white;
                        padding: 15px;
                        text-decoration: none;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                        background-color: {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? '#007bff' : 'transparent' }};
                    "
                    onclick="toggleSubMenu()">
                    <span>
                        <i class="fas fa-database"></i> Master Data
                    </span>
                    <i class="fas {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? 'fa-chevron-down' : 'fa-chevron-right' }}" id="submenu-icon"></i>
                </a>
                <div id="submenu" style="display: {{ request()->is('barang*') || request()->is('layanan*') || request()->is('pelanggan*') ? 'block' : 'none' }}; padding-left: 20px;">
                    <a 
                        href="{{ route('barang.index') }}" 
                        style=" 
                            color: white;
                            padding: 10px;
                            text-decoration: none;
                            display: block;
                            margin-bottom: 5px;
                            border-radius: 5px;
                            transition: background-color 0.3s;
                            background-color: {{ request()->routeIs('barang.index') ? '#ccc' : 'transparent' }};
                        ">
                        <i class="fas fa-box"></i> Data Barang
                    </a>
                    <a 
                        href="{{ route('layanan.index') }}" 
                        style=" 
                            color: white;
                            padding: 10px;
                            text-decoration: none;
                            display: block;
                            margin-bottom: 5px;
                            border-radius: 5px;
                            transition: background-color 0.3s;
                            background-color: {{ request()->routeIs('layanan.index') ? '#ccc' : 'transparent' }};
                        ">
                        <i class="fas fa-cogs"></i> Layanan Perbaikan
                    </a>
                </div>
            </div>
            
            <a 
                href="{{ route('pelanggan.index') }}" 
                style=" 
                    color: white;
                    padding: 10px;
                    text-decoration: none;
                    display: block;
                    margin-bottom: 5px;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                    background-color: {{ request()->routeIs('pelanggan.index') ? '#ccc' : 'transparent' }};
                ">
                <i class="fas fa-users"></i> Daftar Pelanggan
            </a>
            <a 
                href="{{ route('karyawan.index') }}" 
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
                <i class="fas fa-user-cog"></i> Data Karyawan
            </a>
            <!-- Transaksi -->
            <a 
                href="{{ route('transaksi.index') }}" 
                style=" 
                    color: white;
                    padding: 15px;
                    text-decoration: none;
                    display: block;
                    margin-bottom: 10px;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                    background-color: {{ request()->routeIs('transaksi.index') ? '#007bff' : 'transparent' }};
                ">
                <i class="fas fa-shopping-cart"></i> Transaksi
            </a>

                    <!-- Laporan Pendapatan -->
        <a 
        href="{{ route('laporan-pendapatan.index') }}" 
        style="
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s, padding-left 0.3s;
            background-color: {{ request()->routeIs('laporan-pendapatan.index') ? '#007bff' : 'transparent' }};">
        <i class="fas fa-chart-line"></i> Laporan Pendapatan
    </a>

            <!-- Logout -->
            <form action="/logout" method="POST">
                @csrf
                <button 
                    type="submit" 
                    style="
                        color: white;
                        padding: 15px;
                        border: none;
                        width: 100%;
                        text-align: left;
                        background-color: #dc3545;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                        margin-top: 10px;
                    ">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main 
    style="
        margin-left: 200px; /* Lebar sidebar sesuai ukuran sebenarnya */
        margin-right: 20px; /* Menambahkan ruang di sebelah kanan */
        padding: 20px; /* Memberikan ruang di dalam elemen */
        background-color: var(--bg-color, #f9fafb); /* Warna latar */
        background-position: left center; /* Menggeser latar belakang sedikit ke kiri */
        background-size: cover; /* Membuat gambar latar belakang mengisi seluruh area */
        width: calc(100% - 240px); /* Mengurangi sedikit lebar untuk memberi ruang lebih di kiri */
        min-height: 100vh; /* Menjaga elemen memenuhi tinggi layar */
        box-sizing: border-box; /* Menghitung padding dalam perhitungan ukuran */
        transition: background-color 0.3s; /* Efek transisi saat perubahan warna latar */
    ">
        
        <!-- Kata Selamat Datang -->
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="font-size: 24px; color: var(--text-color, #333);">Selamat Datang di Bengkel Sinar Baru Motor</h1>
            <p style="color: var(--text-color, #666);">Kelola layanan bengkel dengan mudah dan cepat.</p>
        </div>

        <!-- Dashboard Cards -->
        <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
            <div style="flex: 1; min-width: 200px; background-color: #28a745; color: white; padding: 15px; border-radius: 8px;">
                <h4 style="margin: 0;">Rp 0</h4>
                <p style="margin: 0;">Pendapatan Hari Ini</p>
            </div>
            <div style="flex: 1; min-width: 200px; background-color: #17a2b8; color: white; padding: 15px; border-radius: 8px;">
                <h4 style="margin: 0;">0</h4>
                <p style="margin: 0;">Service Selesai Hari Ini</p>
            </div>
            <div style="flex: 1; min-width: 200px; background-color: #ffc107; color: white; padding: 15px; border-radius: 8px;">
                <h4 style="margin: 0;">0</h4>
                <p style="margin: 0;">Item Terjual Hari Ini</p>
            </div>
            <div style="flex: 1; min-width: 200px; background-color: #dc3545; color: white; padding: 15px; border-radius: 8px;">
                <h4 style="margin: 0;">0</h4>
                <p style="margin: 0;">Stock Telah Habis</p>
            </div>
        </div>

        <!-- Notifikasi -->
        <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
            <h3 style="color: var(--text-color, #333); margin-bottom: 15px;">Notifikasi</h3>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="display: flex; align-items: center; margin-bottom: 10px; color: var(--text-color, #666);">
                    <i class="fas fa-info-circle" style="color: #007bff; margin-right: 10px;"></i>
                    <span>Jadwal servis pelanggan <strong>Budi</strong> pada 25 Desember.</span>
                </li>
                <li style="display: flex; align-items: center; margin-bottom: 10px; color: var(--text-color, #666);">
                    <i class="fas fa-exclamation-circle" style="color: #ffc107; margin-right: 10px;"></i>
                    <span>Stok sparepart <strong>Oli Mesin</strong> hampir habis.</span>
                </li>
                <li style="display: flex; align-items: center; margin-bottom: 10px; color: var(--text-color, #666);">
                    <i class="fas fa-tasks" style="color: #28a745; margin-right: 10px;"></i>
                    <span>Tugas untuk karyawan: Servis motor pelanggan <strong>Dedi</strong>.</span>
                </li>
            </ul>
        </div>


        <!-- Kalender -->
        <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
            <h3 style="color: var(--text-color, #333); margin-bottom: 15px;">Jadwal Servis</h3>
            <div id="calendar"></div>
        </div>

    </main>

    <!-- Footer -->
    <footer style="text-align: center; padding: 20px; background-color: #f1f1f1; position: fixed; bottom: 0; left: 290px; width: calc(100% - 270px);">
        <p style="margin: 0;">&copy; 2024 Bengkel Sinar Baru Motor. Semua hak dilindungi.</p>
    </footer>
</div>

<!-- JavaScript -->
<script>
function toggleSubMenu() {
    const submenu = document.getElementById('submenu');
    const icon = document.getElementById('submenu-icon');
    if (submenu && icon) {
        if (submenu.style.display === 'none' || submenu.style.display === '') {
            submenu.style.display = 'block';
            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-down');
        } else {
            submenu.style.display = 'none';
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-right');
        }
    }
}



    function toggleTheme() {
        const currentTheme = getComputedStyle(document.body).getPropertyValue('--bg-color').trim() || '#f9fafb';
        const newTheme = currentTheme === '#f9fafb' ? '#333' : '#f9fafb';
        const textColor = newTheme === '#333' ? '#fff' : '#333';
        document.body.style.setProperty('--bg-color', newTheme);
        document.body.style.setProperty('--text-color', textColor);

        // Ubah warna sidebar
        const sidebar = document.querySelector('aside');
        sidebar.style.backgroundColor = newTheme === '#333' ? '#212529' : '#343a40';

        // Ubah warna footer
        const footer = document.querySelector('footer');
        footer.style.backgroundColor = newTheme === '#333' ? '#212529' : '#f1f1f1';
        footer.style.color = textColor;
    }
</script>
<button onclick="toggleTheme()" style="position: fixed; bottom: 20px; right: 20px; background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
    Tema
</button>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Total Transaksi Chart
        const transaksiCtx = document.getElementById('totalTransaksiChart').getContext('2d');
        const transaksiChart = new Chart(transaksiCtx, {
            type: 'bar',
            data: {
                labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                datasets: [{ 
                    label: 'Total Transaksi', 
                    data: [10, 15, 20, 25], 
                    backgroundColor: '#007bff' 
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: { enabled: true }
                }
            }
        });

        // Pendapatan Chart
        const pendapatanCtx = document.getElementById('pendapatanChart').getContext('2d');
        const pendapatanChart = new Chart(pendapatanCtx, {
            type: 'line',
            data: {
                labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                datasets: [{ 
                    label: 'Pendapatan', 
                    data: [1000000, 1500000, 2000000, 2500000], 
                    borderColor: '#28a745', 
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    fill: true 
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: { enabled: true }
                }
            }
        });
    });
</script>

<!-- Kalender -->
<!-- Anda dapat menggunakan plugin kalender seperti FullCalendar atau lainnya. Berikut adalah contoh sederhana tanpa plugin: -->
<script>
    // Contoh sederhana kalender
    document.addEventListener("DOMContentLoaded", () => {
        const calendar = document.getElementById('calendar');
        const today = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        calendar.innerHTML = <p>${today.toLocaleDateString('id-ID', options)}</p>;
        // Untuk implementasi kalender yang lebih lengkap, disarankan menggunakan library seperti FullCalendar.
    });
</script>

<!-- Responsivitas Sidebar -->
<style>
    @media (max-width: 768px) {
        aside {
            width: 100%;
            position: static;
            height: auto;
            box-shadow: none;
        }

        main {
            margin-left: 0;
        }

        footer {
            left: 0;
            width: 100%;
        }
    }
</style>
@endsection