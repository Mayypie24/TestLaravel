<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montir extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan nama default yang terbuat dari bentuk jamak
    protected $table = 'montirs';

    // Tentukan primary key kolom yang digunakan
    protected $primaryKey = 'id_montir'; // Kolom primary key

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_montir',
        'no_tlpon',
        'alamat_montir',
        'gajih',
    ];

    // Tentukan tipe kolom untuk validasi otomatis
    protected $casts = [
        'gajih' => 'decimal:2',  // Pastikan gajih disimpan sebagai decimal dengan 2 angka setelah koma
    ];

    // Jika kolom primary key tidak menggunakan auto-increment, set properti ini ke false (opsional)
    public $incrementing = true; // Secara default ini sudah true, tetapi ditambahkan di sini untuk lebih jelas
}
