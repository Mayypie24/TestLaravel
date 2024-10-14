<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;


    // Jika menggunakan nama tabel yang berbeda, tentukan di sini
    protected $table = 'barang';

    // Daftar field yang dapat diisi melalui mass assignment
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'merk_barang',
        'stok_barang',
        'harga_barang',
        'kualitas_barang',
    ];
}
