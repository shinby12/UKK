@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Pelanggan</h1>
    <a href="{{ route('dashboard') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Kembali ke Dashboard</a><br><br>
    <form action="{{ route('pelanggan.update', ['pelanggan' => $pelanggan->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="block">Nama:</label>
    <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required class="w-full p-2 border rounded">

    <label class="block mt-2">Email:</label>
    <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}" required class="w-full p-2 border rounded">

    <label class="block mt-2">Telepon:</label>
    <input type="text" name="telepon" value="{{ old('telepon', $pelanggan->telepon) }}" required class="w-full p-2 border rounded">

    <label class="block mt-2">Alamat:</label>
    <input type="text" name="alamat" value="{{ old('alamat', $pelanggan->alamat) }}" class="w-full p-2 border rounded">

    <button type="submit" class="mt-4 bg-blue-600 text-white p-2 rounded">Simpan</button>
</form>


</div>
@endsection
