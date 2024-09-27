@extends('layouts.sidebar')

@section('main')
<section class="w-full">
  <div id="mainbar" class="fixed left-0 top-0 pt-16 w-full md:pl-64">
      <div class="px-4 md:px-8">
          <h1 class="text-start capitalize text-3xl py-5">Data Appetizer</h1>
      <hr class="w-full border border-gray-200">
  
      <div class="mt-20">
  
          <div class="flex justify-between items-center ">
              <div class="flex flex-col">
                  <h1 class="text-3xl" >Data Appetizer</h1>
                  <hr class="w-40 border-2 border-secondary my-4">
              </div>
              <div class="">
                <a href="/admin/{{$appetizer->first()->id}}/create">
                    <button type="button" class="text-white bg-red-600 
                    focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Buat Data
                    </button>
                </a>
              </div>
              <div>

              </div>
          </div>
          
          @php
              $no = 1;
          @endphp
  
  <div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
              <th scope="col" class="px-4 py-1">No.</th>
              <th scope="col" class="px-4 py-1">Nama Makanan</th>
              <th scope="col" class="px-4 py-1">Harga Makanan</th>
              <th scope="col" class="px-4 py-3 text-center">Stok Makanan</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($appetizer as $data)
          <tr class="border-b dark:border-gray-700">
              <th scope="row" class="px-4 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
              <td class="px-4 py-3 capitalize">{{ $data->nama_menu }}</td>
              <td class="px-4 py-3">Rp {{ number_format($data->harga_menu, 0, ',', '.') }}</td>
              <td class="px-4 py-3">
                  <form action="/update-mutama/{{ $data->id }}" method="POST" class="flex items-center">
                      @csrf
                      @method('PUT')
  
                      <ul class="flex items-center space-x-4">
                          <!-- Tombol Minus -->
                          <li>
                              <button type="button" onclick="decreaseStock({{ $data->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"></path>
                                  </svg>
                              </button>
                          </li>
  
                          <!-- Tampilan Stok -->
                          <li>
                              <input type="number" name="stok_menu" id="stok-{{ $data->id }}" value="{{ $data->stok_menu }}" class="text-center border border-gray-300 w-16 rounded" readonly>
                          </li>
  
                          <!-- Tombol Plus -->
                          <li>
                              <button type="button" onclick="increaseStock({{ $data->id }})" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded">
                                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"></path>
                                  </svg>
                              </button>
                          </li>
  
                          <!-- Tombol Simpan -->
                          <li>
                              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                  Simpan
                              </button>
                          </li>
                      </ul>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  
  </div>
  
      </div>
      </div>
    </div>
  </section>
  <script>
  function increaseStock(id) {
        let stokInput = document.getElementById('stok-' + id);
        let currentStock = parseInt(stokInput.value);
        stokInput.value = currentStock + 1;
    }

    function decreaseStock(id) {
        let stokInput = document.getElementById('stok-' + id);
        let currentStock = parseInt(stokInput.value);
        if (currentStock > 0) {
            stokInput.value = currentStock - 1;
        }
    }
  </script>