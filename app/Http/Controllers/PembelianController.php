<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelians = Pembelian::latest()->paginate(20);
        return view('pembelian.index', compact('pembelians'))
               ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = \App\Models\Barang::all(); // Pastikan model Barang sudah ada
    return view('pembelian.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nm_cust'   => 'required',
        'alamat'    => 'required',
        'quantity'  => 'required|numeric',
        'grade'     => 'required',
        'harga'     => 'required|numeric',
        'tgl_antar' => 'required|date',
        'keterangan' => 'required',
    ]);

    // Hitung total harga
    $total = $request->harga * $request->quantity;

    Pembelian::create([
        'nm_cust'   => $request->nm_cust,
        'alamat'    => $request->alamat,
        'quantity'  => $request->quantity,
        'grade'     => $request->grade,
        'harga'     => $request->harga,
        'total_harga' => $total,
        'tgl_antar' => $request->tgl_antar,
        'keterangan' => $request->keterangan,
        'status'    => 'Pending',
    ]);

    return redirect()->route('pembelian.index')
                     ->with('success', 'Pemesanan Berhasil');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        return view('pembelian.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        return view('pembelian.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
{
    $request->validate([
        'nm_cust'   => 'required',
        'alamat'    => 'required',
        'quantity'  => 'required|numeric',
        'grade'     => 'required',
        'harga'     => 'required|numeric',
        'tgl_antar' => 'required|date',
        'keterangan' => 'required',
    ]);

    // Hitung total harga kembali
    $total = $request->harga * $request->quantity;

    $pembelian->update([
        'nm_cust'   => $request->nm_cust,
        'alamat'    => $request->alamat,
        'quantity'  => $request->quantity,
        'grade'     => $request->grade,
        'harga'     => $request->harga,
        'total_harga' => $total,
        'tgl_antar' => $request->tgl_antar,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('pembelian.index')
                     ->with('success', 'Pemesanan Berhasil Disimpan');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')
                         ->with('success', 'Pemesanan Berhasil Dihapus');
    }


public function payment(Pembelian $pembelian)
{
    return view('pembelian.payment', compact('pembelian'));
}

public function konfirmasi(Pembelian $pembelian)
{
    $pembelian->status = 'Paid';
    $pembelian->save();

    return redirect()->route('pembelian.index')->with('success', 'Pembayaran berhasil dikonfirmasi!');
}

public function batal(Pembelian $pembelian)
{
    $pembelian->status = 'Cancelled';
    $pembelian->save();

    return redirect()->route('pembelian.index')->with('error', 'Waktu pembayaran habis, pesanan dibatalkan!');
}
public function cetak($id)
{
    $pembelian = Pembelian::findOrFail($id);
    $pdf = Pdf::loadView('pembelian.cetak_pdf', compact('pembelian'));
    return $pdf->stream('Bukti_Pembelian_'.$pembelian->nm_cust.'.pdf');
}

}



