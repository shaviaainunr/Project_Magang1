<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('barang.index')->with('success', 'Material Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
{
    $barang = Barang::findOrFail($id);
    return view('user.barang.edit', compact('barang'));
}

public function update(Request $request, $id)
{
    $barang = Barang::findOrFail($id);

    $request->validate([
        'grade' => 'required',
        'material' => 'required',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $data = $request->only('grade','material','harga');

    if ($request->hasFile('gambar')) {
        $file = time().'_'.$request->gambar->getClientOriginalName();
        $request->gambar->move(public_path('uploads/barang'), $file);
        $data['gambar'] = $file;
    }

    $barang->update($data);

return redirect()->route(
    auth()->user()->role === 'admin'
        ? 'admin.barang.index'
        : 'user.barang.index'
)->with('success', 'Material berhasil diperbarui');

}


    public function destroy(Barang $barang)
    {
        File::delete('Foto_Material/' . $barang->gambar);
        $barang->delete();

        return redirect()->route('user.barang.index')->with('success', 'Data Material Berhasil Dihapus');
    }
}
