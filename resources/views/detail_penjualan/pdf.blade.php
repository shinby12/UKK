<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Penjualan</h2>
        <p><strong>ID Penjualan:</strong> {{ $detailPenjualan->penjualan->id }}</p>
        <p><strong>Nama Produk:</strong> {{ $detailPenjualan->produk->nama }}</p>
        <p><strong>Jumlah:</strong> {{ $detailPenjualan->jumlah }}</p>
        <p><strong>Harga Satuan:</strong> Rp{{ number_format($detailPenjualan->harga_satuan, 2) }}</p>
        <p><strong>Subtotal:</strong> Rp{{ number_format($detailPenjualan->subtotal, 2) }}</p>

        <table>
            <tr>
                <th>ID Penjualan</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                <td>{{ $detailPenjualan->penjualan->id }}</td>
                <td>{{ $detailPenjualan->produk->nama }}</td>
                <td>{{ $detailPenjualan->jumlah }}</td>
                <td>Rp{{ number_format($detailPenjualan->harga_satuan, 2) }}</td>
                <td>Rp{{ number_format($detailPenjualan->subtotal, 2) }}</td>
            </tr>
        </table>

        <p style="margin-top: 20px;">Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>
