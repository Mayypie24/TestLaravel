<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\FonateController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TPKController;


Route::get('/tpk', [TPKController::class, 'index'])->name('tpk.index');
Route::get('/tpk/form', [TPKController::class, 'form'])->name('tpk.form');
Route::post('/tpk/store-barang', [TPKController::class, 'storeBarang'])->name('tpk.storeBarang');
Route::post('/tpk/store-kriteria', [TPKController::class, 'storeKriteria'])->name('tpk.storeKriteria');


Route::get('/laporan/keluhan', [LaporanController::class, 'keluhan'])->name('laporan.keluhan');
Route::get('/laporan/pendapatan', [LaporanController::class, 'pendapatan'])->name('laporan.pendapatan');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::post('/send-message', [FonateController::class, 'sendMessage']);

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
// Route untuk menyimpan data transaksi
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/print/{id}', [TransaksiController::class, 'print'])->name('transaksi.print');



// Route default
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Middleware untuk route yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// Rute untuk menampilkan semua barang
Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
// Rute untuk menampilkan form tambah barang
Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
// Rute untuk menyimpan barang baru
Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
// Rute untuk menampilkan form edit barang
Route::get('barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
// Rute untuk update barang
Route::put('barang/{id}', [BarangController::class, 'update'])->name('barang.update');
// Rute untuk menghapus barang
Route::delete('barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    // routes/web.php
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/tpk', [BarangController::class, 'tpk'])->name('barang.tpk');

    // Routes untuk Kelola Barang
    Route::resource('barang', BarangController::class);
    // Routes untuk Kelola Layanan
    Route::resource('layanan', LayananController::class);
    Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store');
});



Route::get('/dashboard', function () {
    return view('dashboard'); // Pastikan file view bernama 'dashboard.blade.php'
})->name('dashboard');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

use App\Http\Controllers\PelangganController;

Route::resource('pelanggan', PelangganController::class);
use App\Http\Controllers\MontirController;

Route::resource('montir', MontirController::class);
Route::get('/akun', function () {
    return view('akun.index');
})->name('akun.index');


