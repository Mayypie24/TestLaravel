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
        // Mengambil data barang dan layanan
        $barang = Barang::all();
        $layanan = Layanan::all();
    
        // Pastikan data terkirim ke view
        return view('transaksi.create', compact('barang', 'layanan'));
    }

    public function getHarga($id)
{
    // Cek jika barang atau layanan, bisa disesuaikan dengan model Anda
    $barang = Barang::find($id);
    $layanan = Layanan::find($id);

    // Tentukan harga yang sesuai
    if ($barang) {
        return response()->json(['harga' => $barang->harga_satuan]);
    } elseif ($layanan) {
        return response()->json(['harga' => $layanan->harga]);
    }

    return response()->json(['harga' => 0]);
}
    

    public function print($id)
{
    $transaksi = Transaksi::with(['barang', 'layanan'])->findOrFail($id);

    return view('transaksi.print', compact('transaksi'));
}

    

public function store(Request $request)
{
    $request->validate([
        'jenis_transaksi' => 'required',
        'harga_satuan' => 'required|numeric|min:0',
        'jumlah' => 'required|integer|min:1',
        'harga_total' => 'required|numeric|min:0',
        'tanggal_transaksi' => 'required|date',
    ]);

    Transaksi::create([
        'jenis_transaksi' => $request->jenis_transaksi,
        'id_barang' => $request->id_barang,
        'id_layanan' => $request->id_layanan,
        'harga_satuan' => $request->harga_satuan,
        'jumlah' => $request->jumlah,
        'harga_total' => $request->harga_total,
        'tanggal_transaksi' => $request->tanggal_transaksi,
    ]);

    return back()->with('success', 'Transaksi berhasil disimpan!');
}
    
    
}
