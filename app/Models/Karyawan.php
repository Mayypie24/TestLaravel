<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Menentukan nama tabel (tanpa "s" pada karyawan)
    protected $table = 'karyawan';

    // Tentukan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'nama_karyawan',
        'no_telepon',
        'alamat',
        'gaji',
    ];
}
