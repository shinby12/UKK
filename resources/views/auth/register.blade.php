<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kasir App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Daftar ke Kasir App</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="name" required class="w-full p-2 border rounded focus:ring focus:ring-green-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full p-2 border rounded focus:ring focus:ring-green-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full p-2 border rounded focus:ring focus:ring-green-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full p-2 border rounded focus:ring focus:ring-green-300">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white p-2 rounded hover:bg-green-700">Daftar</button>
        </form>

        <p class="text-center mt-4 text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-green-600">Login</a>
        </p>
    </div>

</body>
</html>
