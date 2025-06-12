@extends('layouts.navbar')

@section('main')
    <main>
        <div class="sm:w-[70%] my-32 flcx h-auto justify-center flex-col mx-auto mb-10 bg-white px-5 py-12 shadow">
            <div class="">
                <p class="sm:text-5xl text-3xl pt-10 font-bold text-start">Pesanan Anda</p>
                <hr class="border-4 border-secondary my-4 w-[15%] ">
            </div>
            <div class="container mx-auto mt-10">
                <!-- Tabel Pesanan -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Tanggal Order</th>
                                <th class="py-2 px-4 border-b">Total Biaya</th>
                                <th class="py-2 px-4 border-b">Metode Order</th>
                                <th class="py-2 px-4 border-b">Status Order</th>
                                <th class="py-2 px-4 border-b">Unduh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">
                                        {{ \Carbon\Carbon::parse($order->created_at)->locale('id')->translatedFormat('l, j F Y') }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">Rp
                                        {{ number_format($order->total_biaya, 0, ',', '.') }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">{{ ucfirst($order->metode_order) }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <span
                                            class="
                                                                                                    @if($order->status === 'Diterima') 
                                                                                                        text-white px-4 py-1 rounded bg-blue-500
                                                                                                    @elseif($order->status === 'Diproses') 
                                                                                                        texy-white px-4 py-1 rounded bg-yellow-300 
                                                                                                    @elseif($order->status === 'Siap Ambil')
                                                                                                        text-white px-4 py-1 rounded bg-red-500
                                                                                                    @else
                                                                                                        text-white px-4 py-1 bg-green-500
                                                                                                    @endif
                                                                                                                                                                                        ">

                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <!-- Unduh -->
                                        <a href="{{ route('order.invoice', $order->id) }}"
                                            class="bg-black text-white py-1 px-3 rounded">
                                            Unduh Invoice!
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">Tidak ada pesanan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection