<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Nama tabel
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga_satuan',
        'merk_barang',
        'stok_barang',
        'harga_barang',
        'kualitas_barang',
    ];
}
