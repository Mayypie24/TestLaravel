<?php

// app/Models/Transaksi.php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang benar
    protected $table = 'transaksi'; // Pastikan ini adalah nama tabel yang benar

    protected $fillable = [
        'jenis_transaksi', 'harga_satuan', 'jumlah', 'harga_total', 'tanggal_transaksi', 'id_barang', 'id_layanan'
    ];

    // Relasi ke model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    // Relasi ke model Layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}
