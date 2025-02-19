<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        // Simpan Foto ke Storage
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk', 'public');
        }
    
        Produk::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'foto' => $fotoPath
        ]);
    
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }
    


    public function edit($id)
{
    $produk = Produk::findOrFail($id); // Ambil produk berdasarkan ID
    $produks = Produk::all(); // Ambil semua produk untuk dropdown

    return view('produk.edit', compact('produk', 'produks'));
}


public function update(Request $request, $id)
{
    $produk = Produk::find($id);

    if (!$produk) {
        return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan');
    }

    $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'deskripsi' => 'nullable'
    ]);

    // Debugging: Cek apakah validasi berjalan dengan benar
    dd($request->all(), $produk);

    $produk->update($request->only(['nama', 'harga', 'stok', 'deskripsi']));

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
}





    
    

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}

