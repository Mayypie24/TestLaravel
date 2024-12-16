<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan konvensi Laravel
    protected $table = 'layanan'; // Jika Anda menggunakan nama tabel 'layanan'

    // Tentukan atribut yang bisa diisi massal
    protected $fillable = [
        'nama_layanan',
        'deskripsi_layanan',
        'harga_layanan',
        'durasi_layanan',
    ];

    
}

