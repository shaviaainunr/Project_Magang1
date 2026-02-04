<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    // Method untuk menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');  // Pastikan view 'auth.register' ada di resources/views/auth/register.blade.php
    }

    // Method untuk menangani submit registrasi (opsional, tapi direkomendasikan)
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'user',  // Default role, sesuaikan jika perlu
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}