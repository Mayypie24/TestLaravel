<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar semua pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::all(); // Mengambil semua data pelanggan
        return view('pelanggan.index', compact('pelanggans')); // Mengarahkan ke 'pelanggan.index'
    }

    // Menampilkan form untuk menambah data pelanggan
    public function create()
    {
        return view('pelanggan.create'); // Mengarahkan ke 'pelanggan.create'
    }

    // Menyimpan data pelanggan yang baru ditambahkan
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_tlpon' => 'required|string|max:15',
            'alamat_pelanggan' => 'required|string',
        ]);

        // Menyimpan data ke database
        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_tlpon' => $request->no_tlpon,
            'alamat_pelanggan' => $request->alamat_pelanggan,
        ]);

        // Redirect ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // Mencari data pelanggan berdasarkan ID
        return view('pelanggan.edit', compact('pelanggan')); // Mengarahkan ke 'pelanggan.edit'
    }

    // Memperbarui data pelanggan yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_tlpon' => 'required|string|max:15',
            'alamat_pelanggan' => 'required|string',
        ]);

        // Mencari data pelanggan dan memperbaruinya
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_tlpon' => $request->no_tlpon,
            'alamat_pelanggan' => $request->alamat_pelanggan,
        ]);

        // Redirect ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    // Menghapus data pelanggan
    public function destroy($id)
    {
        // Mencari data pelanggan berdasarkan ID dan menghapusnya
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        // Redirect ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus.');
    }
}

