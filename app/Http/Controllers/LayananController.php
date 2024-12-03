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
        // Validasi data
        $validatedData = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi_layanan' => 'required|string',
            'harga_layanan' => 'required|numeric',
            'durasi_layanan' => 'required|integer',
        ]);

        // Simpan ke database
        Layanan::create($validatedData);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }
    
    
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_layanan' => 'required|string|max:255',
        'deskripsi_layanan' => 'required|string',
        'harga_layanan' => 'required|numeric',
        'durasi_layanan' => 'required|integer',
    ]);

    $layanan = Layanan::findOrFail($id);
    $layanan->update([
        'nama_layanan' => $request->nama_layanan,
        'deskripsi_layanan' => $request->deskripsi_layanan,
        'harga_layanan' => $request->harga_layanan,
        'durasi_layanan' => $request->durasi_layanan,
    ]);

    return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
}

    public function edit($id)
{
    // Temukan layanan berdasarkan ID
    $layanan = Layanan::findOrFail($id);

    // Kembalikan view edit dengan data layanan yang ingin diedit
    return view('layanan.edit', compact('layanan'));
}

public function destroy($id)
{
    // Temukan layanan berdasarkan ID dan hapus
    $layanan = Layanan::findOrFail($id);
    $layanan->delete();

    // Redirect ke halaman index layanan dengan pesan sukses
    return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
}

}
