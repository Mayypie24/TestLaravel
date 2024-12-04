<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan nama default yang terbuat dari bentuk jamak
    protected $table = 'pelanggans';

    // Tentukan primary key kolom yang digunakan
    protected $primaryKey = 'id_pelanggan'; // Kolom primary key

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_pelanggan',
        'no_tlpon',
        'alamat_pelanggan',
    ];
}

