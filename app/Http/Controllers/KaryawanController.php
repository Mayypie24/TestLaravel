<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }    

    public function create()
    {
        return view('karyawan.create'); // Tampilkan form tambah karyawan
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_karyawan' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'gaji' => 'required|numeric',
        ]);

        // Simpan data karyawan baru
        Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'gaji' => $request->gaji,
        ]);

        // Redirect ke halaman index karyawan dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan');
    }


    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'gaji' => 'required|numeric',
        ]);
    
        // Cari karyawan berdasarkan ID
        $karyawan = Karyawan::findOrFail($id);
    
        // Update data karyawan
        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'gaji' => $request->gaji,
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }    
    

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
