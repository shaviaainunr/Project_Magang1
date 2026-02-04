<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
      public function showLoginForm()
    {
        return view('auth.login'); // tampilan form login
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
            // Set flash session untuk notifikasi selamat datang
            session()->flash('welcome', 'Selamat datang, ' . auth()->user()->name);

            // Arahkan berdasarkan role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.beranda');
            } else {
                return redirect()->route('user.beranda');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
