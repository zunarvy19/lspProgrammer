<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }

        .summary-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            background-color: #f9f9f9;
        }

        .summary-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table th,
        .details-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .details-table th {
            background-color: #f2f2f2;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Laporan Penjualan</h1>
        <p>Heaven Dining</p>
        <p><strong>Periode:</strong> {{ $period }}</p>
    </div>

    <h3>Ringkasan Laporan</h3>
    <table class="summary-table">
        <tr>
            <td><strong>Total Pesanan Selesai</strong></td>
            <td class="text-right">{{ $totalOrders }} Pesanan</td>
        </tr>
        <tr>
            <td><strong>Total Pendapatan</strong></td>
            <td class="text-right"><strong>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <h3>Rincian Pesanan</h3>
    <table class="details-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th class="text-right">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td class="text-right">Rp {{ number_format($order->total_biaya, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data pesanan yang selesai pada periode ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>