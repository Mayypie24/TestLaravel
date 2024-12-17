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
        $barang = Barang::select('id', 'nama_barang', 'harga')->get();
        $layanan = Layanan::select('id', 'nama_layanan', 'harga')->get();
    
        return view('transaksi.create', compact('barang', 'layanan'));
    }

    

    public function print($id)
{
    $transaksi = Transaksi::with(['barang', 'layanan'])->findOrFail($id);

    return view('transaksi.print', compact('transaksi'));
}

    

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'jenis_transaksi' => 'required',
        'id_barang' => 'nullable|exists:barangs,id',
        'id_layanan' => 'nullable|exists:layanans,id',
        'jumlah' => 'required|integer|min:1',
        'tanggal_transaksi' => 'required|date',
    ]);

    // Logika untuk menyimpan transaksi
    $hargaSatuan = 0;
    if ($request->jenis_transaksi == 'barang') {
        $barang = Barang::find($request->id_barang);
        if (!$barang || $barang->harga == 0) {
            return back()->withErrors(['error' => 'Harga barang tidak valid.'])->withInput();
        }
        $hargaSatuan = $barang->harga;
    } elseif ($request->jenis_transaksi == 'layanan') {
        $layanan = Layanan::find($request->id_layanan);
        if (!$layanan || $layanan->harga == 0) {
            return back()->withErrors(['error' => 'Harga layanan tidak valid.'])->withInput();
        }
        $hargaSatuan = $layanan->harga;
    }

    // Menghitung harga total
    $hargaTotal = $hargaSatuan * $request->jumlah;

    // Simpan transaksi ke database
    Transaksi::create([
        'jenis_transaksi' => $request->jenis_transaksi,
        'id_barang' => $request->id_barang,
        'id_layanan' => $request->id_layanan,
        'jumlah' => $request->jumlah,
        'harga_satuan' => $hargaSatuan,
        'harga_total' => $hargaTotal,
        'tanggal_transaksi' => $request->tanggal_transaksi,
    ]);

    return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan!');
}
    
    
}
