@extends('layouts.sidebar')

@section('main')
<section class="w-full">
  <div id="mainbar" class="fixed left-0 top-0 pt-16 w-full md:pl-64">
    <div class="px-4 md:px-8">
      <h1 class="text-start capitalize text-4xl py-5">Data BBM</h1>
      <hr class="w-full border border-gray-200">
    </div>

    <div class="mt-16 flex justify-center">
      <div class="flex flex-col md:flex-row gap-8">

        {{-- pertamina --}}
        <div> 
          <a href="/admin/makutama" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Makanan Utama</h5>
          </a>
        </div>

        {{-- Shell --}}
        <div> 
          <a href="/admin/appetizer" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Appetizer</h5>
            
          </a>
        </div>

        {{-- Vivo --}}
        <div> 
          <a href="/admin/minuman" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Minuman</h5>
            
          </a>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection