<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; margin: 0 auto; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Detail Penjualan</h2>
        <p><strong>ID Penjualan:</strong> {{ $detailPenjualan->penjualan->id }}</p>
        <p><strong>Nama Produk:</strong> {{ $detailPenjualan->produk->nama }}</p>
        <p><strong>Jumlah:</strong> {{ $detailPenjualan->jumlah }}</p>
        <p><strong>Subtotal:</strong> Rp{{ number_format($detailPenjualan->subtotal, 2) }}</p>

        <table>
            <tr>
                <th>ID Penjualan</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                <td>{{ $detailPenjualan->penjualan->id }}</td>
                <td>{{ $detailPenjualan->produk->nama }}</td>
                <td>{{ $detailPenjualan->jumlah }}</td>
                <td>Rp{{ number_format($detailPenjualan->subtotal, 2) }}</td>
            </tr>
        </table>
    </div>

</body>
</html>
