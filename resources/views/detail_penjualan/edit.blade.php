@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Detail Penjualan</h1>

    <form action="{{ route('detail-penjualan.update', $detailPenjualan->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <label class="block">Pilih Penjualan:</label>
        <select name="penjualan_id" class="w-full p-2 border rounded mb-4">
            @foreach($penjualans as $penjualan)
                <option value="{{ $penjualan->id }}" {{ $penjualan->id == $detailPenjualan->penjualan_id ? 'selected' : '' }}>
                    {{ $penjualan->id }} - {{ $penjualan->pelanggan->nama }}
                </option>
            @endforeach
        </select>

        <label class="block">Pilih Produk:</label>
        <select name="produk_id" class="w-full p-2 border rounded mb-4">
            @foreach($produks as $produk)
                <option value="{{ $produk->id }}" {{ $produk->id == $detailPenjualan->produk_id ? 'selected' : '' }}>
                    {{ $produk->nama }} - Rp{{ number_format($produk->harga, 2) }}
                </option>
            @endforeach
        </select>

        <label class="block">Jumlah:</label>
        <input type="number" name="jumlah" class="w-full p-2 border rounded mb-4" min="1" value="{{ $detailPenjualan->jumlah }}" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('detail-penjualan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
    </form>
</div>
@endsection
