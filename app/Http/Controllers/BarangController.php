<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    // Tampilkan hasil perhitungan barang terbaik (TPK)
    public function tpk()
    {
        // Ambil semua data barang
        $barang = Barang::all();
    
        // Pastikan ada data barang
        if ($barang->isEmpty()) {
            return redirect()->route('barang.index')->with('error', 'Data barang belum tersedia!');
        }
    
        // Normalisasi data untuk kriteria
        $maxStok = $barang->max('stok_barang'); // Maksimal stok barang
        $minHarga = $barang->min('harga_barang'); // Minimal harga barang
        $maxKualitas = $barang->whereNotNull('kualitas_barang')
                              ->where('kualitas_barang', '>', 0)
                              ->max('kualitas_barang') ?? 1; // Default ke 1 jika tidak valid
    
        // Menghitung dan memetakan skor total untuk setiap barang
        $sortedBarang = $barang->map(function ($b) use ($maxStok, $minHarga, $maxKualitas) {
            // Normalisasi stok (semakin banyak stok semakin baik)
            $b->score_stok = $maxStok > 0 ? $b->stok_barang / $maxStok : 0;
    
            // Normalisasi harga (semakin murah semakin baik)
            $b->score_harga = $b->harga_barang > 0 ? $minHarga / $b->harga_barang : 0;
    
            // Normalisasi kualitas
            $kualitasBarang = (float) $b->kualitas_barang;
            $maxKualitas = (float) $maxKualitas;
            $b->score_kualitas = $maxKualitas > 0 ? $kualitasBarang / $maxKualitas : 0;
    
            // Hitung total skor
            $b->total_score = 
                ($b->score_stok * 0.3) +  // Bobot stok 30%
                ($b->score_harga * 0.3) + // Bobot harga 30%
                ($b->score_kualitas * 0.4); // Bobot kualitas 40%
    
            return $b;
        })->sortByDesc('total_score');
    
        // Tampilkan data ke view
        return view('barang.tpk', compact('sortedBarang'));
    }
    

// Tampilkan detail barang berdasarkan ID
public function show($id)
{
    $barang = Barang::findOrFail($id);
    return view('barang.show', compact('barang'));
}


    
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
            'harga_barang' => 'required|string', // Ubah ke string dulu
            'kualitas_barang' => 'required|string|max:255',
        ]);
    
        // Konversi harga dan kualitas ke angka
        $validatedData['harga_barang'] = (int) str_replace('.', '', $validatedData['harga_barang']);
        $validatedData['kualitas_barang'] = (int) $validatedData['kualitas_barang'];
    
        // Simpan data ke database
        Barang::create($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function getHarga($id)
    {
        $barang = Barang::find($id);
    
        if ($barang) {
            return response()->json(['harga_satuan' => $barang->harga]);
        }
    
        return response()->json(['message' => 'Barang tidak ditemukan'], 404);
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
        // Validasi data
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_barang' => 'required|integer|min:0',
            'harga_barang' => 'required|string', // Ubah ke string dulu
            'merk_barang' => 'required|string|max:255',
            'kualitas_barang' => 'required|string|max:255',
        ]);
    
        // Temukan barang yang akan diperbarui
        $barang = Barang::findOrFail($id);
    
        // Konversi harga dan kualitas ke angka
        $harga_bersih = (int) str_replace('.', '', $request->harga_barang);
        $kualitas_bersih = (int) $request->kualitas_barang;
    
        // Update data
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok_barang' => $request->stok_barang,
            'harga_barang' => $harga_bersih,
            'merk_barang' => $request->merk_barang,
            'kualitas_barang' => $kualitas_bersih,
        ]);
    
        // Redirect ke daftar barang dengan pesan sukses
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
