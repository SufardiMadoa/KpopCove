<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Laporan Transaksi</h1>
    <p>Periode: {{ $startDate ?? 'Semua' }} - {{ $endDate ?? 'Semua' }}</p>

    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id_transaksi }}</td>
                    <td>{{ $transaksi->pelanggan->name }}</td>
                    <td>{{ $transaksi->produk->name }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y') }}</td>
                    <td>Rp {{ number_format($transaksi->harga_total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Transaksi: Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</h3>
</body>

</html>
