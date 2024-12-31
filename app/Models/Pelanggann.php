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
        'plat_da',           // Menambahkan plat_da ke kolom yang bisa diisi
        'nama_pelanggan',
        'no_tlpon',
    ];

    // Tentukan kolom yang tidak boleh diisi (guarded) jika ada
    // protected $guarded = ['id_pelanggan']; // Opsional jika ingin melindungi kolom tertentu
}


