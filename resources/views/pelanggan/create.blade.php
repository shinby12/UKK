@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Tambah Pelanggan</h2>
    <a href="{{ route('dashboard') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Kembali ke Dashboard</a><br>
<br>
    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="telepon" class="block text-gray-700">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" class="w-full px-4 py-2 border rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('pelanggan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
    </form>
</div>
@endsection
