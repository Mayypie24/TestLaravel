<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar semua pelanggan (hanya menampilkan Plat DA, Nama, dan No Telpon)
    public function index()
    {
        // Mengambil data pelanggan dengan kolom yang diperlukan
        $pelanggans = Pelanggan::select('id_pelanggan', 'plat_da', 'nama_pelanggan', 'no_tlpon')->get();

        return view('pelanggan.index', compact('pelanggans'));
        
    }

    // Menampilkan form untuk menambah data pelanggan (hanya dengan Plat DA, Nama, dan No Telpon)
    public function create()
    {
        return view('pelanggan.create'); // Mengarahkan ke 'pelanggan.create'
    }

    // Menyimpan data pelanggan yang baru ditambahkan
    public function store(Request $request)
    {
        $request->validate([
            'plat_da' => 'required|string|max:255',  // Ensuring plat_da is required
            'nama_pelanggan' => 'required|string|max:255',
            'no_tlpon' => 'required|string|max:15',
        ]);
    
        // Create a new pelanggan record
        Pelanggan::create([
            'plat_da' => $request->plat_da,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_tlpon' => $request->no_tlpon,
        ]);
    
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }
    
    
    // Menampilkan form untuk mengedit data pelanggan (hanya dengan Plat DA, Nama, dan No Telpon)
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); // Mencari data pelanggan berdasarkan ID
        return view('pelanggan.edit', compact('pelanggan')); // Mengarahkan ke 'pelanggan.edit'
    }

    // Memperbarui data pelanggan yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_tlpon' => 'required|string|max:20',  // No Telepon tidak boleh lebih dari 15 karakter
        ]);
    
        // Cek apakah plat_da diubah
        $pelanggan = Pelanggan::findOrFail($id);
        
        // Update pelanggan dengan data yang valid
        $pelanggan->update($validatedData);
    
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
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

