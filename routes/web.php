<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');

Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

// Route default
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

    // Routes untuk Kelola Barang
    Route::resource('barang', BarangController::class);

    // Routes untuk Kelola Layanan
    Route::resource('layanan', LayananController::class);

    Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');

// Route di web.php
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
// Route untuk home (jika perlu)
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
