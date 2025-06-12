@extends('layouts.sidebar')

@section('main')
    <section class="w-full">
        {{-- Asumsi Anda sudah memperbaiki layout ini agar tidak `fixed` --}}
        <div id="mainbar" class="w-full pt-24 md:pl-64">
            <div class="px-4 md:px-8">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">Laporan Data Order</h1>
                        <hr class="w-40 border-2 border-secondary my-4">
                    </div>
                    <div class="ml-auto">
                        {{-- Ganti dengan route untuk cetak PDF jika ada --}}
                        <a href="#">
                            <button type="button"
                                class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                Cetak Laporan
                            </button>
                        </a>
                    </div>
                </div>

                <div class="mt-6 overflow-x-auto bg-white rounded-lg shadow">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                <th class="py-3 px-4 text-right text-xs font-medium text-gray-500 uppercase">Total</th>
                                <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase">Pembayaran</th>
                                <th class="py-3 px-4 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($orders as $order)
                                <tr>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{-- Data user sekarang pasti ada berkat Eager Loading --}}
                                        {{ $order->user->name ?? 'User Dihapus' }}
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $order->created_at->translatedFormat('j M Y, H:i') }}
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-900 text-right">
                                        {{-- DIUBAH: Menggunakan total_price --}}
                                        Rp {{ number_format($order->total_biaya, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-500">
                                        {{-- DIUBAH: Menggunakan payment_method --}}
                                        {{ ucfirst($order->metode_order) }}
                                    </td>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm">
                                        {{-- Form untuk update status --}}
                                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST"
                                            class="flex items-center justify-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            {{-- DIUBAH: name & options disesuaikan --}}
                                            <select name="status"
                                                class="block w-full rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                {{-- Loop semua status yang mungkin --}}
                                                @foreach (['Diterima', 'diproses', 'Siap Ambil', 'Siap Ambil'] as $status)
                                                    {{-- DIUBAH: Pengecekan menggunakan $order->status --}}
                                                    <option value="{{ $status }}" @selected($order->status == $status)>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit"
                                                class="bg-blue-600 text-white px-3 py-2 rounded-md text-xs font-semibold hover:bg-blue-700">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-10 text-gray-500">Tidak ada data pesanan yang masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection