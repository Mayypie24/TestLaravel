<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanPendapatanController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan tanggal mulai dan selesai, pastikan menggunakan objek Carbon
        $startDate = Carbon::parse($request->input('start_date', Carbon::now()->startOfMonth()));
        $endDate = Carbon::parse($request->input('end_date', Carbon::now()->endOfMonth()));

        // Mengambil data transaksi dalam rentang tanggal tertentu
        $transaksi = Transaksi::whereBetween('created_at', [$startDate, $endDate])
                              ->get();

        // Menghitung total pendapatan
        $totalPendapatan = $transaksi->sum('harga_total');

        // Mengirim data ke tampilan
        return view('laporan-pendapatan.index', compact('transaksi', 'totalPendapatan', 'startDate', 'endDate'));
    }
}

