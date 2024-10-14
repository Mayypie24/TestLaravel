<?php

// app/Http/Controllers/LayananController.php
namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $layanan = new Layanan;
        $layanan->no = $request->no; // Menyimpan nomor layanan
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->deskripsi_layanan = $request->deskripsi_layanan;
        $layanan->harga_layanan = $request->harga_layanan;
        $layanan->durasi_layanan = $request->durasi_layanan;
        $layanan->save();
    
        return redirect()->route('layanan.index');
    }
    
    public function update(Request $request, $id)
    {
        $layanan = Layanan::find($id);
        $layanan->no = $request->no; // Memperbarui nomor layanan
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->deskripsi_layanan = $request->deskripsi_layanan;
        $layanan->harga_layanan = $request->harga_layanan;
        $layanan->durasi_layanan = $request->durasi_layanan;
        $layanan->save();
    
        return redirect()->route('layanan.index');
    }
    
    

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
    public function edit($id)
{
    // Temukan layanan berdasarkan ID
    $layanan = Layanan::findOrFail($id);

    // Kembalikan view edit dengan data layanan yang ingin diedit
    return view('layanan.edit', compact('layanan'));
}

}
