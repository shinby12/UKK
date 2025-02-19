<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold mb-6">Laporan Penjualan</h1>

    <!-- Form Filter Tanggal -->
    <form action="{{ route('laporan.penjualan.filter') }}" method="POST" class="mb-4">
        @csrf
        <label for="start_date">Dari: </label>
        <input type="date" name="start_date" required class="p-2 border rounded">
        <label for="end_date">Sampai: </label>
        <input type="date" name="end_date" required class="p-2 border rounded">
        <button type="submit" class="p-2 bg-blue-600 text-white rounded">Filter</button>
    </form>

    <!-- Tabel Laporan Penjualan -->
    <table class="w-full bg-white rounded shadow-md">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Pelanggan</th>
                <th class="p-3">Total Harga</th>
                <th class="p-3">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan as $jual)
            <tr class="border-b">
                <td class="p-3">{{ $jual->created_at->format('d-m-Y') }}</td>
                <td class="p-3">{{ $jual->pelanggan->nama }}</td>
                <td class="p-3">Rp {{ number_format($jual->total_harga, 0, ',', '.') }}</td>
                <td class="p-3">
                    <ul>
                        @foreach($jual->detailPenjualan as $detail)
                            <li>{{ $detail->produk->nama_produk }} - {{ $detail->jumlah }} pcs</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
