@extends('layouts.navbar')

@section('main')
<main>
    <div class="sm:w-[70%] my-32 flcx h-auto justify-center flex-col mx-auto mb-10 bg-white px-5 py-12 shadow">
        <div>
            <p class="sm:text-5xl text-3xl pt-10 font-bold text-start">Pesanan Anda</p>
            <hr class="border-4 border-secondary my-4 w-[15%] ">
        </div>
        <div class="container mx-auto mt-10">
            <!-- Tabel Pesanan -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Nama Pelanggan</th>
                            <th class="py-2 px-4 border-b">Tanggal Order</th>
                            <th class="py-2 px-4 border-b">Menu</th>
                            <th class="py-2 px-4 border-b">Jumlah</th>
                            <th class="py-2 px-4 border-b">Harga Menu</th>
                            <th class="py-2 px-4 border-b">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ordersitems as $order)
                            @php
                                $totalBiaya = 0; // Inisialisasi total biaya
                               
                            @endphp
                            @foreach($order->items as $item)
                                <tr>
                                    @if ($loop->first) <!-- Tampilkan nama pelanggan dan tanggal hanya pada item pertama -->
                                        <td class="py-2 px-4 border-b text-center" rowspan="{{ $order->items->count() }}">
                                            {{ $order->user ? $order->user->name : 'Nama tidak ditemukan' }} <!-- Menampilkan nama pelanggan -->
                                        </td>
                                        <td class="py-2 px-4 border-b text-center" rowspan="{{ $order->items->count() }}">
                                            {{ \Carbon\Carbon::parse($order->tanggal_order)->locale('id')->translatedFormat('l, j F Y') }}
                                        </td>
                                    @endif
                                    <td class="py-2 px-4 border-b text-center">{{ $item->menu->nama_menu }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $item->quantity }}</td>
                                    <td class="py-2 px-4 border-b text-center">Rp {{ number_format($item->price, 0, ',', '.') }}</td>

                                    <td class="py-2 px-4 border-b text-center">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @php
                                    $totalBiaya = 0;
                                    $totalBiaya += $item->price * $item->quantity;
                                @endphp
                            @endforeach
                            <tr>
                                <td class="py-2 px-4 border-b text-center" colspan="5">Total Biaya</td>
                                <td class="py-2 px-4 border-b text-center">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada pesanan.</td> <!-- Sesuaikan colspan -->
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
