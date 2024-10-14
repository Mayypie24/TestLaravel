<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
{
    return redirect()->route('home'); // Mengarahkan ke dashboard setelah login
}

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba untuk login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect ke dashboard jika login berhasil
            return redirect()->route('dashboard');
        }

        // Redirect kembali jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    // Logout pengguna
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Anda telah logout.');
    }
}
