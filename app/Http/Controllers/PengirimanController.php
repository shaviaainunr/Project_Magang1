<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        // Hanya tampilkan pesanan yang tidak dibatalkan
    $pembelians = Pembelian::where('status', '!=', 'dibatalkan')->get();

    return view('pengiriman.index', compact('pembelians'));;
    }
    // Menampilkan form tambah pengiriman (jika butuh)
    public function create()
    {
        return view('pengiriman.create'); // Buat file Blade ini jika diperlukan
    }

    // Simpan pengiriman baru
    public function store(Request $request)
    {
        // Logika simpan data
    }
    public function status($id)
{
    $pembelian = Pembelian::findOrFail($id);

    // Cek apakah pesanan dibatalkan
    if ($pembelian->status == 'dibatalkan') {
        return redirect()->back()->with('error', 'Pesanan ini telah dibatalkan dan tidak dapat dilacak.');
    }

    return view('pengiriman.status', compact('pembelian'));
}

}
