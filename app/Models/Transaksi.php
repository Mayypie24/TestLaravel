<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    

    protected $table = 'transaksi'; // Menentukan nama tabel yang benar
    
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'jumlah',
        'harga_satuan',
        'total_harga',
    ];

public function barang()
{
    return $this->belongsTo(Barang::class);
}


}
