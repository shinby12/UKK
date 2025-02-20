@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Detail Penjualan</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>ID Penjualan:</strong> {{ $detailPenjualan->penjualan->id }}</p>
        <p><strong>Tanggal Penjualan:</strong> {{ $detailPenjualan->penjualan->tanggal }}</p>

        <hr class="my-4">

        <p><strong>Nama Produk:</strong> {{ $detailPenjualan->produk->nama }}</p>
        <p><strong>Jumlah:</strong> {{ $detailPenjualan->jumlah }}</p>
        <p><strong>Harga Satuan:</strong> Rp{{ number_format($detailPenjualan->harga_satuan, 2) }}</p>
        <p><strong>Subtotal:</strong> Rp{{ number_format($detailPenjualan->subtotal, 2) }}</p>

        <hr class="my-4">
        <a href="{{ route('detail-penjualan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 mt-4 inline-block">Kembali</a>
        <a href="{{ route('detail-penjualan.pdf', $detailPenjualan->id) }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
    Download PDF</a>

    </div>
</div>

@endsection
