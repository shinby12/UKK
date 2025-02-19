@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Daftar Pelanggan</h1>

    <a href="{{ route('pelanggan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pelanggan</a>
    <a href="{{ route('dashboard') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Kembali ke Dashboard</a>
    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Nama</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Telepon</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggans as $pelanggan)
            <tr>
                <td class="border p-2">{{ $pelanggan->nama }}</td>
                <td class="border p-2">{{ $pelanggan->email }}</td>
                <td class="border p-2">{{ $pelanggan->telepon }}</td>
                <td class="border p-2">
                    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Hapus pelanggan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
