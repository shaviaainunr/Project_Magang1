<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan harga dari paling murah ke paling mahal
    $barangs = Barang::orderBy('harga', 'asc')->get();
    
    return view('user.barang.index', compact('barangs'))
           ->with('i', (request()->input('page', 1) - 1));
    }

    public function create()
    {
        return view('user.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade' => 'required',
            'material' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Foto_Material';
        $file->move($tujuan_upload, $nama_file);

        Barang::create([
            'grade' => $request->grade,
            'material' => $request->material,
            'harga' => $request->harga,
            'gambar' => $nama_file,
        ]);

        return redirect()->route('user.barang.index')->with('success', 'Material Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit(Barang $barang)
    {
        return view('user.barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang) // ✅ pakai langsung $barang
    {
        $request->validate([
            'grade' => 'required',
            'material' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // cek apakah ada gambar baru
        if ($request->hasFile('gambar')) {
            File::delete('Foto_Material/' . $barang->gambar);
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('Foto_Material', $nama_file);
            $barang->gambar = $nama_file;
        }

        $barang->update([
            'grade' => $request->grade,
            'material' => $request->material,
            'harga' => $request->harga,
            'gambar' => $barang->gambar,
        ]);

        return redirect()->route('user.barang.index')->with('success', 'Material Berhasil Disimpan');
    }

    public function destroy(Barang $barang)
    {
        File::delete('Foto_Material/' . $barang->gambar);
        $barang->delete();

        return redirect()->route('user.barang.index')->with('success', 'Data Material Berhasil Dihapus');
    }
}
