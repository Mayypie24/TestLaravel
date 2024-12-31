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
        $transaksiBarang = Transaksi::where('jenis_transaksi', 'Barang')->with('barang')->get();
        $transaksiLayanan = Transaksi::where('jenis_transaksi', 'Layanan')->with('layanan')->get();
    
        return view('transaksi.index', compact('transaksiBarang', 'transaksiLayanan'));
    }
    

public function create()
{
    $barang = Barang::all(); // Mengambil semua data barang
    $layanan = Layanan::all(); // Mengambil semua data layanan
    return view('transaksi.create', compact('barang', 'layanan'));
}

public function cetak($id)
{
    // Ambil data transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Tampilkan tampilan cetak
    return view('transaksi.cetak', compact('transaksi'));
}



public function store(Request $request)
{
    $request->validate([
        'jenis_transaksi' => 'required|string',
        'id_barang' => 'nullable|exists:barang,id',
        'id_layanan' => 'nullable|exists:layanan,id',
        'harga_satuan' => 'required|numeric|min:0',
        'jumlah' => 'required|integer|min:1',
        'harga_total' => 'required|numeric|min:0',
    ]);

    $id_barang = $request->jenis_transaksi === 'Barang' ? $request->id_barang : null;
    $id_layanan = $request->jenis_transaksi === 'Layanan' ? $request->id_layanan : null;

    Transaksi::create([
        'jenis_transaksi' => $request->jenis_transaksi,
        'id_barang' => $id_barang,
        'id_layanan' => $id_layanan,
        'harga_satuan' => $request->harga_satuan,
        'jumlah' => $request->jumlah,
        'harga_total' => $request->harga_total,

    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
}


    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data berhasil dihapus');
    }
}
