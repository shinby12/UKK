<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kasir App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-600 text-white p-5">
            <h2 class="text-2xl font-bold mb-6">Kasir App</h2>
            <ul>
                <li class="mb-2"><a href="{{ route('dashboard') }}" class="block py-2 px-4 bg-blue-700 rounded">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('produk.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Produk</a></li>
                <li class="mb-2"><a href="{{ route('pelanggan.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Pelanggan</a></li>
                <li class="mb-2"><a href="{{ route('penjualan.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Penjualan</a></li>
                <li><form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="w-full text-left py-2 px-4 bg-red-600 hover:bg-red-700 rounded">Logout</button></form></li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold">Total Produk</h2>
                    <p class="text-gray-600 text-2xl">{{ $produkCount }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold">Total Pelanggan</h2>
                    <p class="text-gray-600 text-2xl">{{ $pelangganCount }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold">Total Penjualan</h2>
                    <p class="text-gray-600 text-2xl">{{ $penjualanCount }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
