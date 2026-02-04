<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PengirimanController extends Controller
{
    // ===============================
    // LIST PENGIRIMAN
    // ===============================
    public function index()
{
    $pembelians = Pembelian::where('status', '!=', 'dibatalkan')
        ->orderBy('id', 'desc') // ⬅️ Z → A (terbaru di atas)
        ->get();

    return view('pengiriman.index', compact('pembelians'));
}

    // ===============================
    // HALAMAN STATUS PENGIRIMAN
    // ===============================
    public function status($id)
{
    $pembelian = Pembelian::findOrFail($id);

    // USER TIDAK BOLEH MASUK JIKA BELUM PAID
    if (
        auth()->user()->role === 'user' &&
        $pembelian->status !== 'Paid'
    ) {
        abort(403, 'Pembayaran belum disetujui admin');
    }

    return view('pengiriman.status', compact('pembelian'));
}

    // ===============================
    // UPLOAD BUKTI (ADMIN ONLY)
    // ===============================
    public function uploadBukti(Request $request, $id, $tahap)
    {
        // 🔐 ADMIN ONLY
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403);
        }

        // VALIDASI FILE
        $request->validate([
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);

        $pembelian = Pembelian::findOrFail($id);

        // FIELD SESUAI TAHAP
        $field = match ($tahap) {
            'proses'    => 'bukti_proses',
            'berangkat' => 'bukti_berangkat',
            'sampai'    => 'bukti_sampai',
            default     => abort(404),
        };

        // SIMPAN FILE
        $file = $request->file('bukti');

        // ⛔ TIDAK MENGUBAH NAMA FILE ASLI (SESUAI PERMINTAAN)
        $filename = time().'_'.$file->getClientOriginalName();

        $file->storeAs(
            'bukti_pengiriman',
            $filename,
            'public'
        );

        // SIMPAN KE DATABASE
        $pembelian->$field = $filename;
        $pembelian->save();

        return back()->with('success', 'Bukti berhasil diupload');
    }

    // ===============================
    // CETAK / LIHAT BUKTI
    // ===============================
    public function cetakBukti($file)
    {
        $path = storage_path('app/public/bukti_pengiriman/'.$file);

        if (!file_exists($path)) {
            abort(404);
        }

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        // JIKA PDF → LANGSUNG BUKA
        if ($ext === 'pdf') {
            return response()->file($path, [
                'Content-Type' => 'application/pdf',
            ]);
        }

        // JIKA GAMBAR → KONVERSI KE PDF
        return Pdf::loadView(
            'pengiriman.bukti_pdf',
            ['file' => $file]
        )->stream('bukti_pengiriman.pdf');
    }
    public function selesai($id)
{
    // ADMIN ONLY
    if (auth()->user()->role !== 'admin') {
        abort(403);
    }

    $pembelian = Pembelian::findOrFail($id);

    $pembelian->status_pengiriman = 'selesai';
    $pembelian->save();

    return back()->with('success', 'Pengiriman telah diselesaikan');
}


}
