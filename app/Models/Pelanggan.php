<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = ['plat_da', 'nama_pelanggan', 'no_tlpon'];
}
