<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPesanan      = Pembelian::count();
        $pengirimanSelesai = Pembelian::where('status', 'Selesai')->count();
        $pengirimanProses  = Pembelian::where('status', 'Proses')->count();
        $barangs           = Barang::orderBy('created_at', 'desc')->get(); // <-- kirim ini ke view

        return view('user.dashboard', compact(
            'totalPesanan',
            'pengirimanSelesai',
            'pengirimanProses',
            'barangs'
        ));
    }
}
