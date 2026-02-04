<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProfilController extends Controller
{
    public function edit($id)
    {
        return view('userprofil_edit');
    }

public function update(Request $request, $id)
{
    $user = Auth::user();

    $request->validate([
        'name'  => 'required|string|max:255',
        'password' => 'nullable|min:6',
        'foto' => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = [
        'name'  => $request->name,
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    if ($request->hasFile('foto')) {

        if ($user->foto && File::exists(public_path('img/'.$user->foto))) {
            File::delete(public_path('img/'.$user->foto));
        }

        $filename = time().'_'.$request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('img'), $filename);

        $data['foto'] = $filename;
    }

    $user->update($data);

    return back()->with('success', 'Profil berhasil diperbarui');
}
}
