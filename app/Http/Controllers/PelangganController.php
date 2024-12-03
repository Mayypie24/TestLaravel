<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all(); // Mendapatkan semua data pelanggan
        return view('pelanggan.index', compact('pelanggan')); // Tampilkan data di view pelanggan.index
    }

    // Menampilkan form untuk menambah pelanggan baru
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|unique:pelanggan,email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        // Simpan data ke database
        Pelanggan::create($validatedData);

        // Redirect ke halaman index atau ke halaman lainnya
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }
    

    // Menampilkan form untuk mengedit pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Menyimpan perubahan data pelanggan
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
    
        // Temukan pelanggan berdasarkan ID
        $pelanggan = Pelanggan::find($id);
    
        // Jika pelanggan tidak ditemukan
        if (!$pelanggan) {
            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan');
        }
    
        // Perbarui data pelanggan
        $pelanggan->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'email' => $request->input('email'),
        ]);
    
        // Redirect ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui');
    }
    

    // Menghapus pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
