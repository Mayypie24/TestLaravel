<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Invoice Transaksi</h1>
    <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Nama Pelanggan:</strong> {{ $transaksi->nama_pelanggan }}</p>
    <p><strong>Tanggal Transaksi:</strong> {{ $transaksi->created_at }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->items as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total Bayar:</strong> {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
</body>
</html>
