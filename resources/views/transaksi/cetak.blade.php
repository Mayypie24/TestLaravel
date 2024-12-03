<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Invoice</title>
</head>
<body>
    <h1>Invoice Transaksi</h1>
    <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Nama Pelanggan:</strong> {{ $transaksi->pelanggan->nama ?? 'Tidak Ada' }}</p>
    <p><strong>Nama Barang:</strong> {{ $transaksi->barang->nama ?? 'Tidak Ada' }}</p>
    <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
</body>
</html>
