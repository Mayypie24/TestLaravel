<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Keluhan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function keluhan()
    {
        $keluhan = Keluhan::all();
        return view('laporan.keluhan', compact('keluhan'));
    }
    
    public function pendapatan()
    {
        $pendapatan = Transaksi::sum('harga_total');
        $transaksi = Transaksi::all();
        return view('laporan.pendapatan', compact('pendapatan', 'transaksi'));
    }
    
}
