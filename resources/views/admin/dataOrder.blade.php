@extends('layouts.sidebar')

@section('main')
<section class="w-full">
  <div id="mainbar" class="fixed left-0 top-0 pt-16 w-full md:pl-64">
      <div class="px-4 md:px-8">
          <h1 class="text-start capitalize text-3xl py-5">Data Order</h1>
      <hr class="w-full border border-gray-200">
  
      <div class="mt-20">
  
        <div class="flex justify-between items-center">
          <div class="flex flex-col">
              <h1 class="text-3xl">Data Laporan Order</h1>
              <hr class="w-40 border-2 border-secondary my-4">
          </div>
          <div class="ml-auto">
              <a href="{{ route('admin.cetakpdf') }}">
                  <button type="button" class="text-white bg-red-600 
                  focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Cetak Data
                  </button>
              </a>
          </div>
      </div>
      
          
          @php
              $no = 1;
          @endphp
  
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
      <thead>
          <tr>
              <th class="py-2 px-4 border-b">Nama Pelanggan</th>
              <th class="py-2 px-4 border-b">Tanggal Order</th>
              <th class="py-2 px-4 border-b">Total Biaya</th>
              <th class="py-2 px-4 border-b">Metode Order</th>
              <th class="py-2 px-4 border-b">Status Order</th>
          </tr>
      </thead>
      <tbody>
          @forelse($orders as $order)
              <tr>
                  <td class="py-2 px-4 border-b text-center">{{ $order->user ? $order->user->name : 'Nama tidak ditemukan' }}</td>
                  <td class="py-2 px-4 border-b text-center">{{ \Carbon\Carbon::parse($order->created_at)->locale('id')->translatedFormat('l, j F Y') }}</td>
                  <td class="py-2 px-4 border-b text-center">Rp {{ number_format($order->total_biaya, 0, ',', '.') }}</td>
                  <td class="py-2 px-4 border-b text-center">{{ ucfirst($order->metode_order) }}</td>
                  <td class="py-2 px-4 border-b text-center">
                      <form action="{{ route('admin.updateStatus', $order->id) }}" method="POST"> 
                        {{--  --}}
                          @csrf
                          @method('PUT')
                          <select name="status_order" class="border rounded p-2">
                              <option value="diproses" {{ $order->status_order == 'diproses' ? 'selected' : '' }}>Diproses</option>
                              <option value="dikirim" {{ $order->status_order == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                              <option value="selesai" {{ $order->status_order == 'selesai' ? 'selected' : '' }}>Selesai</option>
                          </select>
                          <button type="submit" class="ml-2 bg-blue-500 text-white p-2 rounded">Update</button>
                      </form>
                  </td>
                  <td class="py-2 px-4 border-b text-center">
                      <!-- Tambahkan aksi lain jika perlu -->
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="6" class="text-center py-4">Tidak ada pesanan.</td>
              </tr>
          @endforelse
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