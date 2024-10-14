<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Method untuk beranda / dashboard
    public function dashboard()
    {
        // Mengembalikan view 'dashboard'
        return view('dashboard'); // Pastikan file 'dashboard.blade.php' ada di folder views
    }
}
