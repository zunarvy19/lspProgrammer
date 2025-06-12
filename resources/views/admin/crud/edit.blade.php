@extends('layouts.sidebar')

@section('main')

  <section class="w-full">

    <div id="mainbar" class="pt-16 w-full md:pl-64">
    <div class="px-4 md:px-8">
      <h1 class="text-start capitalize text-3xl py-5">Manajemen Menu</h1>
      <hr class="w-full border border-gray-200">

      <div class="mt-10">

      <div class="flex justify-between items-center ">
        <div class="flex flex-col">

        <h1 class="text-3xl">Edit Data Menu</h1>
        <hr class="w-40 border-2 border-secondary my-4">
        </div>
        <div>

        <a href="{{ route('admin.dataMenu') }}">
          <button type="button"
          class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 transition-colors">
          Kembali
          </button>
        </a>
        </div>
      </div>


      <section class="bg-white border rounded-lg mt-6">
        <div class="px-4 py-8 mx-auto">
        <h2 class="mb-4 text-2xl font-bold text-gray-900">Formulir Edit: {{ $menu->nama_menu }}</h2>

        @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100" role="alert">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
        </ul>
        </div>
      @endif

        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT') {{-- PENTING untuk proses update --}}

          <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
          {{-- Nama Menu --}}
          <div class="w-full">
            <label for="nama_menu" class="block mb-2 text-sm font-medium text-gray-900">Nama Menu</label>
            {{-- DIUBAH: value diisi dengan data yang ada --}}
            <input type="text" name="nama_menu" id="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
            placeholder="Nama Menu" required>
          </div>

          {{-- Kategori Produk --}}
          <div class="w-full">
            <label for="id_products" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
            <select name="id_products" id="id_products"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
            required>
            @foreach ($products as $product)
        <option value="{{ $product->id }}" @selected(old('id_products', $menu->id_products) === $product->id)>
          {{ $product->kategori }}
        </option>
        @endforeach
            </select>
          </div>

          {{-- Harga Menu --}}
          <div class="w-full">
            <label for="harga_menu" class="block mb-2 text-sm font-medium text-gray-900">Harga Menu</label>
            <input type="number" name="harga_menu" id="harga_menu"
            value="{{ old('harga_menu', $menu->harga_menu) }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
            required placeholder="Harga Menu">
          </div>

          {{-- Stok Menu --}}
          <div class="w-full">
            <label for="stok_menu" class="block mb-2 text-sm font-medium text-gray-900">Stock Menu</label>
            <input type="number" name="stok_menu" id="stok_menu" value="{{ old('stok_menu', $menu->stok_menu) }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
            required placeholder="Stok Menu">
          </div>

          {{-- Gambar Menu --}}
          <div class="sm:col-span-2">
            <label for="gambar_menu" class="block mb-2 text-sm font-medium text-gray-900">Ganti Gambar Menu
            (Opsional)</label>
            <input type="file" name="gambar_menu" id="gambar_menu"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah gambar. (MAX. 2MB)</p>

            @if($menu->gambar_menu)
        <div class="mt-4">
        <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
        <img src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="{{ $menu->nama_menu }}"
          class="h-32 w-auto rounded-md object-cover border p-1">
        </div>
        @endif
          </div>
          </div>

          <div class="flex items-center justify-end space-x-4">

          <button type="submit"
            class="text-white bg-black hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">
            Simpan Perubahan
          </button>
          </div>
        </form>
        </div>
      </section>
      </div>
    </div>
    </div>
  </section>

  {{-- Script Anda untuk validasi input harga bisa tetap di sini --}}

@endsection