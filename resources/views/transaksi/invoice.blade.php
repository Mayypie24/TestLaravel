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
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h2>Invoice Transaksi</h2>
        <table>
            <tr>
                <td>
                    <strong>ID Transaksi:</strong> {{ $transaksi->id }}<br>
                    <strong>Tanggal:</strong> {{ $transaksi->created_at->format('d/m/Y') }}<br>
                    <strong>Nama Pelanggan:</strong> {{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}<br>
                    <strong>No. Plat:</strong> {{ $transaksi->pelanggan->no_plat ?? '-' }}
                </td>
            </tr>
        </table>
        <table>
            <tr class="heading">
                <td>Nama Barang</td>
                <td>Jumlah</td>
                <td>Harga</td>
            </tr>
            @foreach ($transaksi->barang as $barang)
                <tr class="item">
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->pivot->jumlah }}</td>
                    <td>{{ number_format($barang->pivot->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td><strong>Total:</strong></td>
                <td>{{ number_format($transaksi->total, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
