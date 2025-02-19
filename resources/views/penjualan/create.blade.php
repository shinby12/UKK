@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Tambah Penjualan</h1>
        <a href="{{ route('dashboard') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-900">Kembali ke Dashboard</a>
<br>
<br>
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Pelanggan:</label>
            <select name="pelanggan_id" class="border p-2 w-full">
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
    <label class="block">Produk:</label>
    <select name="produk_id" id="produk_id" class="border p-2 w-full">
        <option value="" disabled selected>Pilih Produk</option>
        @foreach($produks as $produk)
            <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">
                {{ $produk->nama }} - Rp {{ number_format($produk->harga, 2) }}
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-4">
        <label for="jumlah">Jumlah</label>
<input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
        </div>
        <div class="mb-4">
            <label class="block">Total Harga:</label>
            <input type="number" name="total_harga" id="total_harga" readonly class="w-full p-2 border rounded">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
    @if ($errors->any())
    <div class="bg-red-500 text-white p-2 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>

@endsection

<script>
document.addEventListener("DOMContentLoaded", function() {
    let produkSelect = document.querySelector("select[name='produk_id']");
    let jumlahInput = document.querySelector("input[name='jumlah']");
    let totalHargaInput = document.querySelector("input[name='total_harga']");

    produkSelect.addEventListener("change", hitungTotal);
    jumlahInput.addEventListener("input", hitungTotal);

    function hitungTotal() {
        let selectedOption = produkSelect.options[produkSelect.selectedIndex];
        let hargaProduk = selectedOption.getAttribute("data-harga") || 0;
        let jumlah = jumlahInput.value || 1;
        totalHargaInput.value = hargaProduk * jumlah;
    }
});
</script>

