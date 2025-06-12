<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pesanan #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            font-size: 14px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .invoice-header h1 {
            font-size: 24px;
            margin: 0;
            color: #000;
        }

        .invoice-details {
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .total-section {
            margin-top: 20px;
            text-align: right;
        }

        .total-section p {
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-header">
            <h1>INVOICE</h1>
            <p>Heaven Dining</p>
        </div>

        <div class="invoice-details">
            <p><strong>ID Pesanan:</strong> #{{ $order->id }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ $order->user->name ?? 'Tidak tersedia' }}</p>
            {{-- DIUBAH: Menggunakan nama kolom yang benar --}}
            <p><strong>Metode Pembayaran:</strong> {{ ucfirst($order->metode_order) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Tanggal Pesan:</strong>
                {{-- DIUBAH: Menggunakan created_at --}}
                {{ \Carbon\Carbon::parse($order->created_at)->locale('id')->translatedFormat('l, j F Y H:i') }}
            </p>
            @if($order->notes)
                <p><strong>Catatan:</strong> {{ $order->notes }}</p>
            @endif
        </div>

        <div>
            <h3>Rincian Item:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-right">Harga Satuan</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- DIUBAH: dari $order->items menjadi $order->details --}}
                    @foreach($order->details as $detail)
                        <tr>
                            <td>{{ $detail->menu->nama_menu }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
                            <td class="text-right">Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                            <td class="text-right">Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="total-section">
            {{-- DIUBAH: Menggunakan total_price --}}
            <p>Total Biaya: Rp {{ number_format($order->total_biaya, 0, ',', '.') }}</p>
        </div>

        <div style="margin-top: 40px; text-align: center; font-size: 12px; color: #777;">
            <p>Terima kasih telah memesan di Resto Bunda!</p>
        </div>
    </div>

</body>

</html>