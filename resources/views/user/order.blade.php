@extends('layouts.navbar')

@section('main')
    <div class="sm:w-[70%] my-32 mx-auto mb-10 bg-white px-5 sm:px-10 py-10 rounded-lg shadow-lg">
        <div class="">
            <p class="sm:text-5xl text-3xl font-bold text-start">Review Pesanan Anda</p>
            <hr class="border-4 border-secondary my-4 w-[15%]">
        </div>

        <div class="container mx-auto mt-10">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                <div class="mb-8">
                    <h2 class="text-2xl font-bold mb-4 border-b pb-2">Item Pesanan</h2>
                    <div class="space-y-4">
                        {{-- Loop semua item dari card --}}
                        @forelse ($cartItems as $id => $item)
                            <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <img src="{{ $item['gambar_menu'] ? asset('storage/' . $item['gambar_menu']) : asset('/image/placeholder.png') }}"
                                        alt="{{ $item['nama_menu'] }}" class="w-16 h-16 object-cover rounded mr-4">
                                    <div>
                                        <h3 class="font-semibold">{{ $item['nama_menu'] }}</h3>
                                        <p class="text-sm text-gray-600">
                                            {{ $item['quantity'] }} x Rp {{ number_format($item['harga_menu'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                                <span class="font-semibold">
                                    Rp {{ number_format($item['quantity'] * $item['harga_menu'], 0, ',', '.') }}
                                </span>
                                <input type="hidden" name="orders[{{ $id }}][quantity]" value="{{ $item['quantity'] }}">
                            </div>
                        @empty
                            <p class="text-gray-500 text-center col-span-full">Keranjang Anda kosong.</p>
                        @endforelse
                    </div>
                </div>

                <div class="mt-6 border-t pt-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Catatan Pesanan:</h3>
                        @if($cartNotes)
                            <p class="text-gray-700 bg-gray-100 p-3 rounded-md italic">"{{ $cartNotes }}"</p>
                        @else
                            <p class="text-gray-500 italic">Tidak ada catatan khusus.</p>
                        @endif
                        <input type="hidden" name="notes" value="{{ $cartNotes }}">
                    </div>

                    <div class="flex justify-between items-center text-xl font-bold">
                        <label>Total Harga</label>
                        <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    </div>

                    <div class="flex justify-between items-center">
                        <label class="font-bold">Metode Pembayaran</label>
                        <div class="w-1/2">
                            <select
                                class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded"
                                id="metode_pembayaran" name="metode_order" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="tunai">Tunai</option>
                                <option value="non-tunai">Non Tunai</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex flex-col items-center space-y-4">
                    <p class="text-sm text-gray-600 text-center max-w-md">
                        <strong>Catatan:</strong> Untuk metode non-tunai, harap transfer ke rekening BCA berikut:
                        <strong>0138 1234 5678</strong> dan konfirmasi melalui WhatsApp.
                    </p>
                    <button type="submit"
                        class="bg-secondary text-white py-3 px-8 rounded-lg font-bold text-lg hover:bg-opacity-80 transition-transform transform hover:scale-105">
                        Konfirmasi dan Pesan Sekarang
                    </button>
                </div>
            </form>
        </div>


        @if(session('message') || session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('message') ?? session('success') }}',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
    </div>
@endsection