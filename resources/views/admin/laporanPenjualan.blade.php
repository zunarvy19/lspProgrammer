<!DOCTYPE html>
<html>
<head>
    <title>Laporan Order</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Restoran Dapur Bunda Bahagia</h1>
    <h2>Laporan Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Tanggal Order</th>
                <th>Total Biaya</th>
                <th>Metode Order</th>
                <th>Status Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->user ? $order->user->name : 'Nama tidak ditemukan' }}</td>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->locale('id')->translatedFormat('l, j F Y') }}</td>
                <td>Rp {{ number_format($order->total_biaya, 0, ',', '.') }}</td>
                <td>{{ ucfirst($order->metode_order) }}</td>
                <td>{{ ucfirst($order->status_order) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>