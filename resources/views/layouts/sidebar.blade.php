<div class="w-64 bg-blue-600 text-white p-5">
    <h2 class="text-2xl font-bold mb-6">Kasir App</h2>
    <ul>
        <li class="mb-2"><a href="{{ route('dashboard') }}" class="block py-2 px-4 bg-blue-700 rounded">Dashboard</a></li>
        <li class="mb-2"><a href="{{ route('produk.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Produk</a></li>
        <li class="mb-2"><a href="{{ route('pelanggan.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Pelanggan</a></li>
        <li class="mb-2"><a href="{{ route('penjualan.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Penjualan</a></li>
        <li><a href="{{ route('laporan.penjualan') }}" class="block py-2 px-4 bg-green-600 hover:bg-green-700 rounded">Laporan</a></li>
    </ul>
</div>
