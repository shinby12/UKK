@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Daftar Produk</h1>
    <a href="{{ route('dashboard') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Kembali ke Dashboard</a>

    <a href="{{ route('produk.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Produk</a>

    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Nama</th>
                <th class="border p-2">Harga</th>
                <th cddclass="border p-2">Stok</th>
                <th class="border p-2">gambar</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
            <tr>
                <td class="border p-2">{{ $produk->nama }}</td>
                <td class="border p-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="border p-2">{{ $produk->stok }}</td>
                <td>
            @if ($produk->foto)
                <img src="{{ asset('storage/' . $produk->foto) }}" width="100">
            @else
                Tidak ada gambar
            @endif
        </td>
                
                <td class="border p-2">
                    <a href="{{ route('produk.edit', $produk->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
