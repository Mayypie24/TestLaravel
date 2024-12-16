<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }
    
    

    public function create()
    {
        $barang = Barang::all();
        $layanan = Layanan::all();
        return view('transaksi.create', compact('barang', 'layanan'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi' => 'required',
            'tanggal_transaksi' => 'required|date',
            'harga_total' => 'required|numeric',
            'id_barang' => 'nullable|exists:barang,id',
            'id_layanan' => 'nullable|exists:layanan,id',
            'jumlah' => 'nullable|integer',
        ]);
    
        $data = $request->only([
            'jenis_transaksi',
            'tanggal_transaksi',
            'harga_total',
            'id_barang',
            'id_layanan',
            'jumlah',
        ]);
    
        // Simpan data ke database
        Transaksi::create($data);
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }    
    
    
}
