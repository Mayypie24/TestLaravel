<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai
    protected $table = 'pelanggan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_pelanggan',
        'email',
        'telepon',
        'alamat'
    ];
}
