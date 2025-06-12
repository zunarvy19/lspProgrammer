@extends('layouts.sidebar')

@section('main')
    <section class="w-full">
        <div id="mainbar" class="w-full pt-24 md:pl-64">
            <div class="px-4 md:px-8">
                {{-- ... Bagian Header Halaman ... --}}
                <div class="flex justify-between items-center">
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-bold">Laporan Data Order</h1>
                        <hr class="w-40 border-2 border-secondary my-4">
                    </div>
                    {{-- ... Tombol Cetak ... --}}
                    {{-- FORM UNTUK FILTER DAN CETAK LAPORAN --}}
                <div class="ml-auto">
                    <form action="{{ route('reports.download') }}" method="GET" class="flex items-center gap-4">
                        <select name="range" class="rounded-md border-gray-300 shadow-sm text-sm">
                            <option value="daily">Laporan Harian (Hari Ini)</option>
                            <option value="weekly">Laporan Mingguan (7 Hari Terakhir)</option>
                            <option value="monthly">Laporan Bulanan (Bulan Ini)</option>
                        </select>
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Cetak Laporan
                        </button>
                    </form>
                </div>
                </div>

                <div class="mt-6 overflow-x-auto bg-white rounded-lg shadow">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3 px-4 text-left ...">Pelanggan</th>
                                <th class="py-3 px-4 text-left ...">Tanggal</th>
                                <th class="py-3 px-4 text-right ...">Total</th>
                                <th class="py-3 px-4 text-left ...">Pembayaran</th>
                                <th class="py-3 px-4 text-center ...">Status</th>
                                <th class="py-3 px-4 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($orders as $order)
                                <tr>
                                    {{-- ... Kolom Pelanggan, Tanggal, Total, Pembayaran ... --}}
                                    <td class="py-4 px-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $order->user->name ?? 'User Dihapus' }}</td>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $order->created_at->translatedFormat('j M Y, H:i') }}</td>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-900 text-right">Rp
                                        {{ number_format($order->total_biaya, 0, ',', '.') }}</td>
                                    <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ ucfirst($order->metode_order) }}</td>

                                    {{-- Kolom Status --}}
                                    <td class="py-4 px-4 whitespace-nowrap text-sm">
                                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST"
                                            class="flex items-center justify-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <select name="status"
                                                class="block w-full rounded-md border-gray-300 shadow-sm text-sm ...">
                                            @foreach (App\Models\orders::$statuses as $statusValue)
                                                <option value="{{ $statusValue }}" @selected($order->status == $statusValue)>
                                                    {{ ucfirst(str_replace('_', ' ', $statusValue)) }}
                                                </option>
                                            @endforeach
                                            </select>
                                            <button type="submit"
                                                class="bg-blue-600 text-white px-3 py-2 rounded-md text-xs">Update</button>
                                        </form>
                                    </td>

                                    {{-- KOLOM BARU DENGAN TOMBOL HAPUS --}}
                                    <td class="py-4 px-4 whitespace-nowrap text-sm text-center">
                                        <ul class="flex items-center space-x-4 justify-center">
                                            <li>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 text-white px-3 py-2 rounded-md text-xs font-semibold hover:bg-red-700"
                                                onclick="return confirm('PERINGATAN: Menghapus order ini tidak dapat diurungkan. Anda yakin?')">
                                                Hapus
                                            </button>
                                        </form>
                                            </li>

                                            @if (auth()->user()->isAdmin() || auth()->user()->isKasir())
                                                <li>
                                        <a href="{{ route('order.invoice', $order->id) }}"
                                            class="bg-black text-white py-1 px-3 rounded">
                                            Invoice
                                        </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    {{-- Sesuaikan colspan menjadi 6 --}}
                                    <td colspan="6" class="text-center py-10 text-gray-500">Tidak ada data pesanan yang masuk.
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