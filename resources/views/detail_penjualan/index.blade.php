@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Daftar Detail Penjualan</h1>

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('detail-penjualan.create') }}" 
            class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
            + Tambah Detail Penjualan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="border p-3 text-left">ID Penjualan</th>
                    <th class="border p-3 text-left">Nama Produk</th>
                    <th class="border p-3 text-left">Jumlah</th>
                    <th class="border p-3 text-left">Subtotal</th>
                    <th class="border p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detail_penjualans as $detail)
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="p-3">{{ $detail->penjualan->id }}</td>
                    <td class="p-3">{{ $detail->produk->nama }}</td>
                    <td class="p-3">{{ $detail->jumlah }}</td>
                    <td class="p-3 text-green-600 font-semibold">Rp{{ number_format($detail->subtotal, 2) }}</td>
                    <td class="p-3">
                        <a href="{{ route('detail-penjualan.show', $detail->id) }}" 
                            class="bg-green-500 text-white px-3 py-1 rounded shadow hover:bg-green-600 transition">
                            🔍 Lihat
                        </a>
                        <a href="{{ route('detail-penjualan.edit', $detail->id) }}" 
                            class="bg-green-500 text-white px-3 py-1 rounded shadow hover:bg-green-600 transition">
                            🔍 Edit
                        </a>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
