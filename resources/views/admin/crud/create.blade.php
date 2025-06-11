@extends('layouts.sidebar')

@section('main')

    <section class="w-full">
        <div id="mainbar" class="fixed left-0 top-0 pt-16 w-full md:pl-64">
            <div class="px-4 md:px-8">
                <h1 class="text-start capitalize text-3xl py-5">Data Menu</h1>
                <hr class="w-full border border-gray-200">

                <div class="mt-20">

                    <div class="flex justify-between items-center ">
                        <div class="flex flex-col">
                            <h1 class="text-3xl">Buat Data</h1>
                            <hr class="w-40 border-2 border-secondary my-4">
                        </div>
                        <div>
                            <a href="/admin/menu">
                                <button type="button"
                                    class="text-white bg-red-600 
                                                                                                            focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Kembali
                                </button>
                            </a>
                        </div>
                    </div>


                    <section class="bg-white border rounded-lg">
                        <div class="px-4 py-8 mx-auto">
                            <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Create Data Menu</h2>
                            @if (session('success'))
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.store', ['id' => $data->first()->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- @method('POST') tidak wajib jika method sudah POST --}}

                                <input type="hidden" name="id_products" value="{{ $category->id }}">

                                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                                    <div class="w-full">
                                        <label for="nama_menu"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            Menu</label>
                                        <input type="text" name="nama_menu" id="nama_menu"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                            placeholder="Nama Menu" required>
                                    </div>
                                    <div class="w-full">
                                        <label for="harga_menu"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                            Menu</label>
                                        <input type="number" name="harga_menu" id="harga_menu"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            required inputmode="numeric" placeholder="Harga Menu">
                                    </div>
                                    <div class="w-full">
                                        <label for="stok_menu"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                                            Menu</label>
                                        <input type="number" name="stok_menu" id="stok_menu"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            required inputmode="numeric" placeholder="Stok Menu">
                                    </div>

                                    <div class="w-full">
                                        <label for="gambar_menu"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar
                                            Menu</label>
                                        <input type="file" name="gambar_menu" id="gambar_menu"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                        <p class="mt-1 text-xs text-gray-500" id="file_input_help">PNG, JPG or GIF (MAX.
                                            2MB).</p>
                                    </div>

                                </div>
                                <div class="flex items-center justify-end space-x-4">
                                    <button type="submit"
                                        class="text-white bg-black hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Buat Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const numberInput = document.getElementById('harga_menu');

            numberInput.addEventListener('input', (e) => {
                if (numberInput.value.length > 5) {
                    numberInput.value = numberInput.value.slice(0, 5);
                }
            });
        });

        document.getElementById('harga_menu').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
@endsection