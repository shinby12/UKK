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
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" class="block py-2 px-4 bg-blue-700 rounded">Dashboard</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('produk.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Produk</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('pelanggan.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Pelanggan</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('penjualan.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Penjualan</a>
                </li>
                <li class="mb-2">
    <a href="{{ route('detail-penjualan.index') }}" class="block py-2 px-4 hover:bg-blue-700 rounded">Detail Penjualan</a>
</li>


                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 px-4 bg-red-600 hover:bg-red-700 rounded">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
