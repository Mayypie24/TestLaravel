<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Transaksi</title>
    <style>
        /* Reset CSS */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin: 20px auto;
            width: 80%;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header Bengkel */
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
            color: #007bff;
        }

        .header p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #343a40;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }

        /* Table untuk Detail Transaksi */
        .table-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table-details td {
            padding: 8px 15px;
            vertical-align: top;
        }

        .table-details .label {
            width: 30%;
            font-weight: bold;
            color: #007bff;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        /* Print Specific Styles */
        @media print {
            body {
                background-color: #fff;
            }

            .container {
                box-shadow: none;
                border: none;
                width: 100%;
                margin: 0;
                padding: 20px;
            }

            .footer {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <!-- Header Bengkel -->
        <div class="header">
            <h1>Bengkel Sinar Baru Motor</h1>
            <p>Alamat: Jl. A Yani, RT 02, RW 01, Kec. Bati-Bati, Kab. Tanah Laut</p>
            <p>Telepon: 0858-4945-2051</p>
        </div>

        <!-- Detail Transaksi -->
        <h2>Detail Transaksi</h2>
        <table class="table-details">
            <tr>
                <td class="label">Jenis Transaksi</td>
                <td>{{ $transaksi->jenis_transaksi }}</td>
            </tr>
            <tr>
                <td class="label">Detail</td>
                <td>
                    @if($transaksi->jenis_transaksi === 'barang' && $transaksi->barang)
                        Barang: {{ $transaksi->barang->nama_barang }} ({{ $transaksi->jumlah }})
                    @elseif($transaksi->jenis_transaksi === 'layanan' && $transaksi->layanan)
                        Layanan: {{ $transaksi->layanan->nama_layanan }}
                    @else
                        Tidak ada detail
                    @endif
                </td>
            </tr>
            <tr>
                <td class="label">Harga Total</td>
                <td>Rp{{ number_format($transaksi->harga_total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Transaksi</td>
                <td>{{ $transaksi->tanggal_transaksi }}</td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>Dicetak oleh Sistem Informasi Bengkel Sinar Baru Motor</p>
        </div>
    </div>
</body>
</html>
