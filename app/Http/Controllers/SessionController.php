<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ tambahkan baris ini!
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Hash; 


class SessionController extends Controller
{
    function index()
    {
        return view("Sesi/index");
    }
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)) {
            //Kalau Auth Sukses
            return redirect('dashboard')->with('success','Berhasil login');
        }else{
            return redirect('Sesi')->withErrors('Email dan Password yang dimasukkan tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('Sesi')->with('Success','Berhasil Logout');
    }

    function register(){
        return view('Sesi/register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ], [
            'name.required'=>'Name Wajib Diisi',
            'email.required'=>'Email Wajib Diisi',
            'email.email'=>'Silahkan Masukkan Email Valid',
            'email..unique'=>'Email Sudah Ada, Silahkan Masukkan Email Lainnya',
            'password.required'=>'Password Wajib Diisi',
            'password.min'=>'Password yang Digunakan Minimal 6 Karakter'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if (Auth::attempt($infologin)) {
    $request->session()->regenerate();
    return redirect()->route('admin.dashboard'); // 👈 arahkan ke beranda admin
}

    }
}
