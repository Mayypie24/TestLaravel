<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Layanan;
use Illuminate\Http\Request;


class TransaksiController extends Controller
{
    
    public function cetak($id)
    {
        // Ambil data transaksi berdasarkan ID
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            abort(404, 'Transaksi tidak ditemukan');
        }

        // Logika cetak transaksi (bisa berupa view PDF atau redirect)
        return view('transaksi.cetak', compact('transaksi'));
    }

    public function create()
    {
        $layanan = Layanan::all(); // Mengambil semua data layanan
        $barang = Barang::all(); // Mengambil semua data barang
        return view('transaksi.create', compact('layanan', 'barang'));
    
    }
    
    
    public function index()
    {
    // Ambil semua data layanan dan barang
    $layanan = Layanan::all(); 
    $barang = Barang::all();

    // Kirim data ke view
    return view('transaksi.index', compact('layanan', 'barang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required',
            'nama_pelanggan' => 'required|string|max:255',
            'no_plat' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);
    
        $barang = Barang::find($validated['id_barang']);
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }
    
        $total_harga = $barang->harga_barang * $validated['jumlah'];
    
        // Simpan transaksi
        $transaksi = Transaksi::create([
            'id_barang' => $validated['id_barang'],
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'no_plat' => $validated['no_plat'],
            'jumlah' => $validated['jumlah'],
            'total_harga' => $total_harga,
        ]);
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }
    
    public function cetakInvoice($id)
    {
        // Cari data transaksi dengan relasi 'barang' dan 'pelanggan'
        $transaksi = Transaksi::with('barang', 'pelanggan')->findOrFail($id);
    
        // Arahkan ke view 'transaksi.cetak'
        return view('transaksi.cetak', compact('transaksi'));
    }
    
    
       
    

    public function destroy($id)
{
    // Cari transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Hapus transaksi
    $transaksi->delete();

    // Redirect kembali ke halaman riwayat transaksi dengan pesan sukses
    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
}

public function show($id)
    {
        // Cari data transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Return view detail transaksi atau invoice
        return view('transaksi.show', compact('transaksi'));
    }
    
}
