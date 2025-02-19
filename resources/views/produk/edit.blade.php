@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Edit Produk</h1>
    
    <form action="{{ route('produk.update', ['produk' => $produk->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

       

        <div class="mb-4">
    <label class="block">Produk:</label>
    <select name="produk_id" id="produk_id" class="border p-2 w-full">
    <option value="" disabled>Pilih Produk</option>
    @foreach($produks as $p)
        <option value="{{ $p->id }}" data-harga="{{ $p->harga }}" data-stok="{{ $p->stok }}" 
            {{ $produk->id == $p->id ? 'selected' : '' }}>
            {{ $p->nama }} - Rp {{ number_format($p->harga, 2) }} (Stok: {{ $p->stok }})
        </option>
    @endforeach
</select>


</div>


        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Stok</label>
            <input type="number" name="stok" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-yellow-300 focus:outline-none" value="{{ $produk->stok }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Harga</label>
            <input type="number" name="harga" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-yellow-300 focus:outline-none" value="{{ $produk->harga }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Foto Produk</label>
            <input type="file" name="foto" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-yellow-300 focus:outline-none">
            
            @if($produk->foto)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $produk->foto) }}" class="w-32 rounded-lg shadow-md">
                </div>
            @endif
        </div>

        <div class="flex justify-between">
            <a href="{{ route('produk.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">Kembali</a>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition">Update</button>
        </div>
    </form>
</div>
@endsection

<script>
document.addEventListener("DOMContentLoaded", function() {
    let produkSelect = document.querySelector("#produk_id");
    let jumlahInput = document.querySelector("#jumlah");
    let totalHargaInput = document.querySelector("#total_harga");

    produkSelect.addEventListener("change", hitungTotal);
    jumlahInput.addEventListener("input", hitungTotal);

    function hitungTotal() {
        let selectedOption = produkSelect.options[produkSelect.selectedIndex];
        let hargaProduk = selectedOption.getAttribute("data-harga") || 0;
        let stokProduk = selectedOption.getAttribute("data-stok") || 0;
        let jumlah = jumlahInput.value || 1;

        if (parseInt(jumlah) > parseInt(stokProduk)) {
            alert("Jumlah melebihi stok yang tersedia!");
            jumlahInput.value = stokProduk; // Atur jumlah ke stok maksimum
        }

        totalHargaInput.value = hargaProduk * jumlah;
    }
});
</script>
