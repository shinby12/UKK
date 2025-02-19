@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <label class="block mb-2">Nama Produk</label>
        <input type="text" name="nama" class="w-full border p-2 rounded mb-3" required>

        <label class="block mb-2">Stok</label>
        <input type="number" name="stok" class="w-full border p-2 rounded mb-3" required>

        <label class="block mb-2">Harga</label>
        <input type="number" name="harga" class="w-full border p-2 rounded mb-3" required>

        <label class="block mb-2">Foto Produk</label>
        <input type="file" name="foto" class="w-full border p-2 rounded mb-3">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow-md hover:bg-blue-700">Simpan</button>
        <a href="{{ route('produk.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Kembali</a>
    </form>
</div>
@endsection
