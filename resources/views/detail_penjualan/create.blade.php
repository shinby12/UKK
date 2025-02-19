@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Tambah Detail Penjualan</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('detail-penjualan.store') }}" method="POST">
            @csrf

            <!-- Pilih Penjualan -->
            <div class="mb-4">
                <label for="penjualan_id" class="block font-medium">Pilih Penjualan:</label>
                <select name="penjualan_id" id="penjualan_id" class="w-full p-2 border rounded" required>
                    <option value="" disabled selected>Pilih Penjualan</option>
                    @foreach($penjualans as $penjualan)
                        <option value="{{ $penjualan->id }}">ID: {{ $penjualan->id }} - Pelanggan: {{ $penjualan->pelanggan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Produk -->
            <div class="mb-4">
                <label for="produk_id" class="block font-medium">Pilih Produk:</label>
                <select name="produk_id" id="produk_id" class="w-full p-2 border rounded" required>
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach($produks as $produk)
                        <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">{{ $produk->nama }} - Rp{{ number_format($produk->harga, 2) }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Jumlah Produk -->
            <div class="mb-4">
                <label for="jumlah" class="block font-medium">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" class="w-full p-2 border rounded" min="1" required>
            </div>

            <!-- Harga Satuan (Otomatis) -->
            <div class="mb-4">
                <label for="harga_satuan" class="block font-medium">Harga Satuan:</label>
                <input type="text" id="harga_satuan" name="harga_satuan" class="w-full p-2 border rounded bg-gray-100" readonly>
            </div>
            <div class="mb-4">
            <input type="hidden" name="harga_satuan" id="harga_satuan_hidden">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('detail-penjualan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Batal</a>
        </form>
    </div>
</div>

<script>
document.getElementById("produk_id").addEventListener("change", function() {
    let harga = this.options[this.selectedIndex].getAttribute("data-harga");
    document.getElementById("harga_satuan").value = harga;
    document.getElementById("harga_satuan_hidden").value = harga; // Kirim nilai ke backend
});
</script>


@endsection
