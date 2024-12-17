<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kriteria;

class TPKController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $kriteria = Kriteria::all();

        if ($barang->isEmpty() || $kriteria->isEmpty()) {
            return redirect()->route('tpk.form')->with('error', 'Data barang dan kriteria harus diisi terlebih dahulu!');
        }

        // Normalisasi
        $maxJumlah = $barang->max('jumlah_terjual');
        $minHarga = $barang->min('harga');
        $maxKualitas = $barang->max('kualitas');

        foreach ($barang as $b) {
            $b->score_jumlah = $b->jumlah_terjual / $maxJumlah;
            $b->score_harga = $minHarga / $b->harga;
            $b->score_kualitas = $b->kualitas / $maxKualitas;

            // Hitung Total Skor
            $b->total_score =
                ($b->score_jumlah * $kriteria[0]->bobot) +
                ($b->score_harga * $kriteria[1]->bobot) +
                ($b->score_kualitas * $kriteria[2]->bobot);
        }

        // Sorting berdasarkan total_score
        $sortedBarang = $barang->sortByDesc('total_score');

        return view('tpk.index', compact('sortedBarang'));
    }

    public function form()
    {
        $barang = Barang::all();
        $kriteria = Kriteria::all();
        return view('tpk.form', compact('barang', 'kriteria'));
    }

    public function storeBarang(Request $request)
    {
        Barang::create($request->all());
        return back()->with('success', 'Barang berhasil ditambahkan.');
    }

    public function storeKriteria(Request $request)
    {
        Kriteria::create($request->all());
        return back()->with('success', 'Kriteria berhasil ditambahkan.');
    }
}
