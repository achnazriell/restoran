<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Ambil credentials
        $data = [
            'email'   => $request->email,
            'password' => $request->password
        ];

        // Coba login
        if (Auth::attempt($data)) {
            // Jika berhasil
            return redirect()->route('admin.dashboard')->with('success', 'Anda Berhasil Login');
        } else {
            // Jika gagal
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }

    public function register()
    {
        return view('register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah ada dibuat',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $login = [
            'email'   => $request->email,
            'password' => $request->password,
        ];

        // Coba login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika berhasil
            return redirect()->route('login')->with('success', 'Anda Berhasil Daftar');
        }
    }
}
