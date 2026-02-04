<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    // Jika USER → hanya hitung pesanan milik user tersebut
    if (Auth::user()->role === 'user') {
        $totalPesanan = Pembelian::where('user_id', Auth::id())->count();
        $pembelians   = Pembelian::where('user_id', Auth::id())->get();
    }
    // Jika ADMIN → hitung semua pesanan
    else {
        $totalPesanan = Pembelian::count();
        $pembelians   = Pembelian::all();
    }

    return view('pembelian.index', compact('pembelians', 'totalPesanan'))
        ->with('i', 0);
}
}
