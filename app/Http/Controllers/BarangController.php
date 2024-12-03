<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    
    // Tampilkan semua barang
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }
    

    // Tampilkan form tambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Simpan barang baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_barang' => 'required|string|max:255|unique:barang',
            'nama_barang' => 'required|string|max:255',
            'merk_barang' => 'required|string|max:255',
            'stok_barang' => 'required|integer|min:1',
            'harga_barang' => 'required|numeric|min:1',
            'kualitas_barang' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Barang::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }
    

    // Tampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }
    

    // Update data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_barang' => 'required|integer|min:0',
            'harga_barang' => 'required|numeric|min:0',
            'merk_barang' => 'required|string|max:255',
            'kualitas_barang' => 'required|string|max:255',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok_barang' => $request->stok_barang,
            'harga_barang' => $request->harga_barang,
            'merk_barang' => $request->merk_barang,
            'kualitas_barang' => $request->kualitas_barang,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    // Hapus barang dari database
    public function destroy($id)
    {
        // Temukan barang berdasarkan ID dan hapus
        $barang = Barang::findOrFail($id);
        $barang->delete();
    
        // Redirect ke daftar barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }

    
    
}
