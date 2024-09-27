<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial, sans-serif';
            color: #222;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .invoice-header {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <h2>Detail Pesanan</h2>
        <p><strong>ID Order:</strong> {{ $dataOrders->id }}</p>
        <p><strong>Nama Pelanggan:</strong> {{ $dataOrders->user ? $dataOrders->user->name : 'Nama tidak ditemukan' }}</p>
        <p><strong>Status:</strong> {{ $dataOrders->status_order }}</p>
        <p><strong>Total Biaya:</strong> Rp {{ number_format($dataOrders->total_biaya, 0, ',', '.') }}</p>
        <p><strong>Tanggal Order:</strong>  {{ \Carbon\Carbon::parse($dataOrders->tanggal_order)->locale('id')->translatedFormat('l, j F Y') }}</p>
    </div>

    <div>
        <h3>Item yang Dipesan:</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataOrders->items as $item)
                    <tr>
                        <td>{{ $item->menu->nama_menu }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
