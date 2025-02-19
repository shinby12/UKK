@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Penjualan</h1>
    <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
        @csrf
        <label class="block">Total Harga:</label>
        <input type="number" name="total_harga" value="{{ $penjualan->total_harga }}" required class="w-full p-2 border rounded">
        
        <label class="block mt-2">Pelanggan ID:</label>
        <input type="text" name="pelanggan_id" value="{{ $penjualan->pelanggan_id }}" required class="w-full p-2 border rounded">
        
        <button type="submit" class="mt-4 bg-blue-600 text-white p-2 rounded">Simpan</button>
    </form>
</div>
@endsection
