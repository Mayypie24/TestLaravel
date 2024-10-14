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
        // Validasi input termasuk id_barang
        $validatedData = $request->validate([
            'id_barang' => 'required|string|max:30|unique:barang,id_barang',
            'nama_barang' => 'required|string|max:255',
            'merk_barang' => 'required|string|max:255',
            'stok_barang' => 'required|integer',
            'harga_barang' => 'required|numeric',
            'kualitas_barang' => 'required|string|max:255',
        ]);
    
        // Simpan ke dalam database
        Barang::create($validatedData);
         // Debugging sebelum redirect
    dd('Barang berhasil disimpan', $validatedData);
    
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }
    
    

    // Tampilkan form edit barang
    public function edit($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        return view('barang.edit', compact('barang'));
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_barang' => 'required|max:10',
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
            'kualitas_barang' => 'required',
        ]);
    
        // Ambil data barang berdasarkan ID
        $barang = Barang::findOrFail($id);
    
        // Update data barang
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->merk_barang = $request->merk_barang;
        $barang->stok_barang = $request->stok_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->kualitas_barang = $request->kualitas_barang;
        $barang->save(); // Simpan perubahan
    
        // Redirect ke halaman barang
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }
    

    // Hapus barang dari database
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
