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
                  <h1 class="text-3xl" >Buat Data</h1>
                  <hr class="w-40 border-2 border-secondary my-4">
              </div>
              <div>
              <a href="/admin/menu">
              <button type="button" class="text-white bg-red-600 
              focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Kembali
              </button>
              </a>
              </div>
          </div>
  
          
          <section class="bg-white border rounded-lg">
              <div class=" px-4 py-8 mx-auto">
                  <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Create Data Menu</h2>
                  <form action="{{ route('admin.store', ['id' => $data->id]) }}" method="POST">
                  @csrf
                  @method('POST')
                      <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                          <div class="sm:col-span-2 hidden">
                              <label for="vendorName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan</label>
                              <input type="text" name="id_products" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('name', $data->id_products) }}" placeholder="Nama Perusahaan" required="" @readonly(true)>
                          </div>
                          <div class="w-full">
                              <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu</label>
                              <input type="text" name="nama_menu" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Nama Menu" @required(true)>
                          </div>
                          <div class="w-full">
                              <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Menu</label>
                              <input type="number" name="harga_menu" id="harga_menu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required inputmode="numeric" pattern="[0-9]*" @required(true) placeholder="Harga Menu">
                          </div>

                          <div class="w-full">
                              <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok Menu</label>
                              <input type="number" name="stok_menu" id="stok_menu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required inputmode="numeric" pattern="[0-9]*" @required(true) placeholder="Stok Menu">
                          </div>
                          
                      </div>
                      <div class="flex items-center justify-end space-x-4">
                          <button type="submit" class="text-white bg-black hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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