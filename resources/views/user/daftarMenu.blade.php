@extends('layouts.navbar')

@section('main')
    <main class="my-20 mb-10 flex sm:w-[80%] mx-auto">
        <div class="container my-20">
            <div class="">
                <h1 class="text-center text-5xl text-[#78ABA8] tracking-wide font-bold">Daftar Menu</h1>
                <hr class="w-56 mx-auto md:mx-auto border-[#EF9C66] border-2 mt-2">
            </div>

            <div class="my-20">

                {{-- Makanan utama --}}
                <h1 class="text-3xl text-primary font-semibold ">Makanan Utama</h1>
                <div class="card-container py-4 flex flex-row gap-x-4">

                    {{-- card 1 --}}
                    @forelse ($makutama as $menu)
                        <div
                            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                            <a href="#">
                                @if ($menu->gambar_menu)
                                    <img class="rounded-t-lg h-48 w-full object-cover"
                                        src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" />
                                @else
                                    <img class="rounded-t-lg h-48 w-full object-cover" src="/image/placeholder.png"
                                        alt="Gambar tidak tersedia" />
                                @endif
                            </a>
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5 truncate"
                                        title="{{ $menu->nama_menu }}">
                                        {{ $menu->nama_menu }}
                                    </h5>
                                </a>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                        Stock
                                    </div>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">
                                        {{ $menu->stok_menu }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold text-gray-900">
                                        Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}
                                    </span>
                                    <button type="button" data-id="{{ $menu->id }}"
                                        class="add-to-cart-btn text-white bg-[#F0A04B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Beli
                                    </button>
                                </div>
                            </div>
                        </div>

                    @empty
                        {{-- Pesan ini akan muncul jika variabel $makutama kosong --}}
                        <div class="col-span-full text-center py-10">
                            <p class="text-gray-500">Tidak ada data makanan yang tersedia saat ini.</p>
                        </div>
                    @endforelse


                </div>

                {{-- Appetizer --}}
                <div class="appetizer-container my-10">
                    <h1 class="text-3xl font-semibold text-primary py-4">Appetizer</h1>

                    <div class="card-appetizer flex flex-row gap-x-4">

                        @forelse ($appetizer as $menu)
                            {{-- Card Component (ini akan diulang untuk setiap item) --}}
                            <div
                                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                                <a href="#">
                                    @if ($menu->gambar_menu)
                                        <img class="rounded-t-lg h-48 w-full object-cover"
                                            src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" />
                                    @else
                                        <img class="rounded-t-lg h-48 w-full object-cover" src="/image/placeholder.png"
                                            alt="Gambar tidak tersedia" />
                                    @endif
                                </a>
                                <div class="px-5 pb-5">
                                    <a href="#">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5 truncate"
                                            title="{{ $menu->nama_menu }}">
                                            {{ $menu->nama_menu }}
                                        </h5>
                                    </a>
                                    <div class="flex items-center mt-2.5 mb-5">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            Stock
                                        </div>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">
                                            {{ $menu->stok_menu }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xl font-bold text-gray-900">
                                            Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}
                                        </span>
                                        <button type="button" data-id="{{ $menu->id }}"
                                            class="add-to-cart-btn text-white bg-[#F0A04B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            Beli
                                        </button>
                                    </div>
                                </div>
                            </div>

                        @empty
                            {{-- Pesan ini akan muncul jika variabel $makutama kosong --}}
                            <div class="col-span-full text-center py-10">
                                <p class="text-gray-500">Tidak ada data makanan yang tersedia saat ini.</p>
                            </div>
                        @endforelse

                    </div>

                    {{-- Minuman --}}
                    <div class="appetizer-container my-10">
                        <h1 class="text-3xl font-semibold text-primary py-4">Minuman</h1>

                        <div class="card-appetizer flex flex-row gap-x-4">

                            @forelse ($minuman as $menu)
                                {{-- Card Component (ini akan diulang untuk setiap item) --}}
                                <div
                                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                                    <a href="#">
                                        {{-- Menampilkan gambar secara dinamis --}}
                                        @if ($menu->gambar_menu)
                                            <img class="rounded-t-lg h-48 w-full object-cover"
                                                src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}" />
                                        @else
                                            {{-- Gambar placeholder jika tidak ada gambar --}}
                                            <img class="rounded-t-lg h-48 w-full object-cover" src="/image/placeholder.png"
                                                alt="Gambar tidak tersedia" />
                                        @endif
                                    </a>
                                    <div class="px-5 pb-5">
                                        <a href="#">

                                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5 truncate"
                                                title="{{ $menu->nama_menu }}">
                                                {{ $menu->nama_menu }}
                                            </h5>
                                        </a>
                                        <div class="flex items-center mt-2.5 mb-5">
                                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                                Stock
                                            </div>

                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">
                                                {{ $menu->stok_menu }}
                                            </span>
                                        </div>
                                        <div class="flex items-center justify-between">

                                            <span class="text-xl font-bold text-gray-900">
                                                Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}
                                            </span>
                                            <button type="button" data-id="{{ $menu->id }}"
                                                class="add-to-cart-btn text-white bg-[#F0A04B] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Beli
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                {{-- Pesan ini akan muncul jika variabel $makutama kosong --}}
                                <div class="col-span-full text-center py-10">
                                    <p class="text-gray-500">Tidak ada data makanan yang tersedia saat ini.</p>
                                </div>
                            @endforelse

                        </div>
                    </div>
    </main>
@endsection