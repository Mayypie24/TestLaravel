<?php

namespace App\Http\Controllers;

use App\Models\Montir;
use Illuminate\Http\Request;

class MontirController extends Controller
{
    // Menampilkan daftar semua montir
    public function index()
    {
        $montirs = Montir::all(); // Mengambil semua data montir
        return view('montir.index', compact('montirs')); // Memastikan kita mengarahkan ke 'montir.index'
    }

    // Menampilkan form untuk menambah data montir
    public function create()
    {
        return view('montir.create'); // Memastikan kita mengarahkan ke 'montir.create'
    }

    // Menyimpan data montir yang baru ditambahkan
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_montir' => 'required|string|max:255',
            'no_tlpon' => 'required|string|max:15',
            'alamat_montir' => 'required|string',
            'gajih' => 'required|numeric|min:0',
        ]);

        // Menyimpan data ke database
        Montir::create([
            'nama_montir' => $request->nama_montir,
            'no_tlpon' => $request->no_tlpon,
            'alamat_montir' => $request->alamat_montir,
            'gajih' => $request->gajih,
        ]);

        // Redirect ke halaman daftar montir dengan pesan sukses
        return redirect()->route('montir.index')->with('success', 'Montir berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data montir
    public function edit($id)
    {
        $montir = Montir::findOrFail($id); // Mencari data montir berdasarkan ID
        return view('montir.edit', compact('montir')); // Memastikan kita mengarahkan ke 'montir.edit'
    }

    // Memperbarui data montir yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_montir' => 'required|string|max:255',
            'no_tlpon' => 'required|string|max:15',
            'alamat_montir' => 'required|string',
            'gajih' => 'required|numeric|min:0',
        ]);

        // Mencari data montir dan memperbaruinya
        $montir = Montir::findOrFail($id);
        $montir->update([
            'nama_montir' => $request->nama_montir,
            'no_tlpon' => $request->no_tlpon,
            'alamat_montir' => $request->alamat_montir,
            'gajih' => $request->gajih,
        ]);

        // Redirect ke halaman daftar montir dengan pesan sukses
        return redirect()->route('montir.index')->with('success', 'Data montir berhasil diperbarui.');
    }

    // Menghapus data montir
    public function destroy($id)
    {
        // Mencari data montir berdasarkan ID dan menghapusnya
        $montir = Montir::findOrFail($id);
        $montir->delete();

        // Redirect ke halaman daftar montir dengan pesan sukses
        return redirect()->route('montir.index')->with('success', 'Data montir berhasil dihapus.');
    }
}
