@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Daftar Penjualan</h1>

    <a href="{{ route('penjualan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Penjualan</a>
    <a href="{{ route('dashboard') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Kembali ke Dashboard</a>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Pelanggan</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Total Harga</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($penjualans as $penjualan)
<tr>
    <td class="border p-2">{{ $penjualan->pelanggan->nama }}</td>
    <td class="border p-2">{{ $penjualan->produk_id }}</td>
    <td class="border p-2">{{ $penjualan->jumlah }}</td>
    <td class="border p-2">Rp {{ number_format($penjualan->total_harga, 2) }}</td>
    <td class="border p-2">
        <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>


        <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

        </tbody>
    </table>
</div>
@endsection
