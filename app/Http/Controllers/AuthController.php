<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // Ganti dengan view login Anda
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('iklan.index')->with('success', 'Selamat datang!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah keluar.');
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register'); // Ganti dengan view registrasi Anda
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email', // Pastikan email unik
            'password' => 'required|string|min:8|confirmed', // Validasi password
        ]);

        // Membuat pengguna baru
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password'); // Ganti dengan view ganti password
    }

    // Proses ganti password
    public function changePassword(Request $request)
{
    // Validasi input
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    // Memeriksa apakah password saat ini cocok
    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'Password saat ini tidak cocok.']);
    }

    // Memperbarui password
    $user = Auth::user(); // Pastikan ini mengembalikan instance User
    $user->password = Hash::make($request->new_password);
    $user->save(); // Save method should work here

    return redirect()->route('iklan.index')->with('success', 'Password berhasil diperbarui.');
}

}
