<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pelanggans',
            'telepon' => 'required|numeric',
            'alamat' => 'nullable'
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit($id)
{
    $pelanggan = Pelanggan::find($id);

    if (!$pelanggan) {
        return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan');
    }

    //dd($pelanggan); // Debugging
    return view('pelanggan.edit', compact('pelanggan'));
}

    
    

public function update(Request $request, $id)
{
    $pelanggan = Pelanggan::find($id);

    if (!$pelanggan) {
        return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan');
    }

    $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:pelanggans,email,' . $pelanggan->id,
        'telepon' => 'required|numeric',
        'alamat' => 'nullable'
    ]);

    // Tampilkan data sebelum update untuk debugging
    //dd($request->all(), $pelanggan);

    $pelanggan->update($request->only(['nama', 'email', 'telepon', 'alamat']));

    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui');
}



    public function destroy($id)
{
    $pelanggan = Pelanggan::findOrFail($id);
    $pelanggan->delete();

    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
}
}
