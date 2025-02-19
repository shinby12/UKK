<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;

class DetailPenjualanController extends Controller
{
    // Menampilkan semua detail penjualan
    public function index()
    {
        $detail_penjualans = DetailPenjualan::with(['penjualan', 'produk'])->get();
        return view('detail_penjualan.index', compact('detail_penjualans'));
    }
    
    // Menampilkan form tambah detail penjualan
    public function create()
    {
        $penjualans = Penjualan::all();
        $produks = Produk::all();
        return view('detail_penjualan.create', compact('penjualans', 'produks'));
    }
    

    // Menyimpan data detail penjualan ke database
    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required|exists:penjualans,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);
    
        $produk = Produk::findOrFail($request->produk_id);
    
        DetailPenjualan::create([
            'penjualan_id' => $request->penjualan_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $produk->harga, // Ambil harga produk dari database
            'subtotal' => $request->jumlah * $produk->harga,
        ]);
    
        return redirect()->route('detail-penjualan.index')->with('success', 'Detail penjualan berhasil ditambahkan!');
    }
    

    // Menampilkan form edit detail penjualan
    public function edit($id)
    {
        $detailPenjualan = DetailPenjualan::findOrFail($id);
        $penjualans = Penjualan::all();
        $produks = Produk::all();
        return view('detail_penjualan.edit', compact('detailPenjualan', 'penjualans', 'produks'));
    }

    // Menyimpan perubahan data detail penjualan
    public function update(Request $request, $id)
    {
        $request->validate([
            'penjualan_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $detailPenjualan = DetailPenjualan::findOrFail($id);
        $produk = Produk::findOrFail($request->produk_id);
        $subtotal = $request->jumlah * $produk->harga;

        $detailPenjualan->update([
            'penjualan_id' => $request->penjualan_id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $produk->harga,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('detail-penjualan.index')->with('success', 'Detail penjualan berhasil diperbarui!');
    }

public function show($id)
{
    $detailPenjualan = DetailPenjualan::with(['penjualan', 'produk'])->findOrFail($id);

    return view('detail_penjualan.show', compact('detailPenjualan'));
}


}
