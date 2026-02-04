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
        'nm_cust'      => 'required',
        'alamat'       => 'required',
        'quantity'     => 'required|numeric',
        'grade'        => 'required',
        'harga'        => 'required|numeric',
        'tgl_antar'    => 'required|date',
        'keterangan'   => 'required',
        'foto_lokasi'  => 'nullable|mimes:jpg,jpeg,png,pdf|max:5000',
    ]);

    $total = $request->harga * $request->quantity;

    $fotoLokasi = null;

    if ($request->hasFile('foto_lokasi')) {
        $file = $request->file('foto_lokasi');
        $fotoLokasi = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/lokasi'), $fotoLokasi);
    }

    Pembelian::create([
        'nm_cust'     => $request->nm_cust,
        'alamat'      => $request->alamat,
        'quantity'    => $request->quantity,
        'grade'       => $request->grade,
        'harga'       => $request->harga,
        'total_harga' => $total,
        'tgl_antar'   => $request->tgl_antar,
        'status'      => 'Pending',
        'keterangan'  => $request->keterangan,
        'foto_lokasi' => $fotoLokasi, // 🔥 INI YANG BENAR
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


    public function paymentPage($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.payment', compact('pembelian'));
    }



    public function konfirmasi(Request $request, $id)
{
    $pembelian = Pembelian::findOrFail($id);

    $request->validate([
        'bukti_pembayaran' => 'required|mimes:jpg,jpeg,png,pdf|max:5000',
    ]);

    if ($request->hasFile('bukti_pembayaran')) {
        $fileName = time().'_'.$request->file('bukti_pembayaran')->getClientOriginalName();
        $request->file('bukti_pembayaran')->move(
            public_path('uploads/bukti'),
            $fileName
        );

        // 🔥 INI WAJIB
        $pembelian->bukti_pembayaran = $fileName;
    }

    $pembelian->status = 'Processing';
    $pembelian->save();

    return redirect()->route('pembelian.index')
        ->with('success', 'Pembayaran sedang diproses');
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
        return $pdf->stream('Bukti_Pembelian_' . $pembelian->nm_cust . '.pdf');
    }

    public function approve($id)
{
    $pembelian = Pembelian::findOrFail($id);

    $pembelian->status = 'Paid'; // 🔑 INI KUNCINYA
    $pembelian->save();

    return back()->with('success', 'Pembayaran disetujui');
}

  public function alasan($id)
{
    $pembelian = Pembelian::findOrFail($id);
    return view('pembelian.alasan', compact('pembelian'));
}

public function reject(Request $request, $id)
{
    $request->validate([
        'alasan_penolakan' => 'required|string'
    ]);

    $pembelian = Pembelian::findOrFail($id);
    $pembelian->status = 'Cancelled';
    $pembelian->alasan_penolakan = $request->alasan_penolakan;
    $pembelian->save();

    return redirect()->route('pembelian.index')
        ->with('success', 'Pesanan berhasil ditolak');
}
    
}
