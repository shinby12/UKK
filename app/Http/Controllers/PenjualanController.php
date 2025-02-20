<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    
    public function index()
    {
        $penjualans = Penjualan::with('pelanggan')->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.create', compact('pelanggans', 'produks'));
    }

    public function store(Request $request)
{
    $request->validate([
        'pelanggan_id' => 'required|exists:pelanggans,id',
        'produk_id' => 'required|exists:produks,id',
        'jumlah' => 'required|integer|min:1',
        'total_harga' => 'required|numeric|min:0',
    ]);

    // Cek stok produk
    $produk = Produk::findOrFail($request->produk_id);
    if ($request->jumlah > $produk->stok) {
        return back()->withErrors(['jumlah' => 'Jumlah melebihi stok yang tersedia!']);
    }

    // Kurangi stok setelah pembelian
    $produk->stok -= $request->jumlah;
    $produk->save();

    // Simpan data penjualan
    Penjualan::create($request->all());

    return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan');
}



    public function edit(Penjualan $penjualan)
    {
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.edit', compact('penjualan', 'pelanggans', 'produks'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil diperbarui');
    }

    public function destroy(Penjualan $penjualan)
{
    $penjualan->delete();
    return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus.');
}


}
