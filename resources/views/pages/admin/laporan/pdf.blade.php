<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 0;
        }
        .date-range {
            text-align: center;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi</h1>
    @if(request('start_date') || request('end_date'))
    <p class="date-range">
        @if(request('start_date')) Dari: {{ \Carbon\Carbon::parse(request('start_date'))->format('d-m-Y') }} @endif
        @if(request('end_date')) Sampai: {{ \Carbon\Carbon::parse(request('end_date'))->format('d-m-Y') }} @endif
    </p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID Pemesanan</th>
                <th>User</th>
                <th>Tanggal Pemesanan</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanans as $pemesanan)
            <tr>
                <td>{{ $pemesanan->id_pemesanan_222305 }}</td>
                <td>{{ $pemesanan->user->nama_222305 ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($pemesanan->tanggal_pemesanan_222305)->format('d-m-Y') }}</td>
                <td>Rp {{ number_format($pemesanan->total_harga_222305, 0, ',', '.') }}</td>
                <td>{{ ucfirst($pemesanan->metode_pembayaran_222305) }}</td>
                <td>{{ ucfirst($pemesanan->status_222305) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
