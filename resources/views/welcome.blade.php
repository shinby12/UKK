<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir App - Belanja Mudah & Cepat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full z-10 top-0">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-blue-600">Kasir App</a>
            <div class="flex space-x-4">
                <input type="text" placeholder="Cari produk..." class="px-4 py-2 border rounded-lg w-64">
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Login</a>
                <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="mt-16">
        <img src="https://source.unsplash.com/1200x400/?shopping,store" class="w-full h-64 object-cover">
    </div>

    <!-- Kategori Produk -->
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Kategori Produk</h2>
        <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
            <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
                <img src="https://source.unsplash.com/100x100/?electronics" class="w-16 h-16">
                <p class="text-gray-700 mt-2">Elektronik</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
                <img src="https://source.unsplash.com/100x100/?fashion" class="w-16 h-16">
                <p class="text-gray-700 mt-2">Fashion</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
                <img src="https://source.unsplash.com/100x100/?groceries" class="w-16 h-16">
                <p class="text-gray-700 mt-2">Makanan</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
                <img src="https://source.unsplash.com/100x100/?beauty" class="w-16 h-16">
                <p class="text-gray-700 mt-2">Kecantikan</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
                <img src="https://source.unsplash.com/100x100/?sports" class="w-16 h-16">
                <p class="text-gray-700 mt-2">Olahraga</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
                <img src="https://source.unsplash.com/100x100/?home" class="w-16 h-16">
                <p class="text-gray-700 mt-2">Perabot</p>
            </div>
        </div>
    </div>

    <!-- Produk Terbaru -->
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">Produk Terbaru</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Produk 1 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://source.unsplash.com/200x200/?product" class="w-full h-40 object-cover">
                <h3 class="text-lg font-semibold mt-2">Nama Produk</h3>
                <p class="text-gray-600">Rp 100.000</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full mt-2">Beli</button>
            </div>
            <!-- Produk 2 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://source.unsplash.com/200x200/?shoes" class="w-full h-40 object-cover">
                <h3 class="text-lg font-semibold mt-2">Sepatu Sport</h3>
                <p class="text-gray-600">Rp 250.000</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full mt-2">Beli</button>
            </div>
            <!-- Produk 3 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://source.unsplash.com/200x200/?watch" class="w-full h-40 object-cover">
                <h3 class="text-lg font-semibold mt-2">Jam Tangan</h3>
                <p class="text-gray-600">Rp 350.000</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full mt-2">Beli</button>
            </div>
            <!-- Produk 4 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="https://source.unsplash.com/200x200/?bag" class="w-full h-40 object-cover">
                <h3 class="text-lg font-semibold mt-2">Tas Stylish</h3>
                <p class="text-gray-600">Rp 150.000</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full mt-2">Beli</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4 mt-10">
        <p>&copy; 2025 Kasir App - Semua Hak Dilindungi</p>
    </footer>

</body>
</html>
