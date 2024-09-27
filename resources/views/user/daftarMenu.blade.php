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
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                <a href="#">
                    <img class="rounded-t-lg" src="/image/spaghetti.jpg" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$makutama[0]->nama_menu}}</h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            Stock
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$makutama[0]->stok_menu}}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900">Rp {{ number_format($makutama[0]->harga_menu, 0, ',', '.') }}</span>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                    </div>
                </div>
            </div>

            {{-- card 2 --}}
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                <a href="#">
                    <img class="rounded-t-lg" src="/image/rawon.jpg" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$makutama[1]->nama_menu}}</h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            Stock
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$makutama[1]->stok_menu}}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900">Rp {{ number_format($makutama[1]->harga_menu, 0, ',', '.') }}</span>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                    </div>
                </div>
            </div>

            {{-- card 3 --}}
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                <a href="#">
                    <img class="rounded-t-lg" src="/image/ayambakar.jpg" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$makutama[2]->nama_menu}}</h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            Stock
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$makutama[2]->stok_menu}}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900">Rp {{ number_format($makutama[2]->harga_menu, 0, ',', '.') }}</span>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                    </div>
                </div>
            </div>

        {{-- card 4 --}}
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
            <a href="#">
                <img class="rounded-t-lg" src="/image/udang.jpg" alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$makutama[3]->nama_menu}}</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        Stock
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$makutama[3]->stok_menu}}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold text-gray-900">Rp {{ number_format($makutama[3]->harga_menu, 0, ',', '.') }}</span>
                    <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                </div>
            </div>
        </div>

            </div>

            {{-- Appetizer  --}}
            <div class="appetizer-container my-10">
              <h1 class="text-3xl font-semibold text-primary py-4">Appetizer</h1>

              <div class="card-appetizer flex flex-row gap-x-4">

                {{-- card 1 --}}
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                    <a href="#">
                        <img class="rounded-t-lg" src="/image/garlicPotato.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$appetizer[0]->nama_menu}}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                Stock
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$appetizer[0]->stok_menu}}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">Rp {{ number_format($appetizer[0]->harga_menu, 0, ',', '.') }}</span>
                            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                        </div>
                    </div>
                </div>

                {{-- card 2 --}}
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                    <a href="#">
                        <img class="rounded-t-lg" src="/image/salad.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$appetizer[1]->nama_menu}}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                Stock
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$appetizer[1]->stok_menu}}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">Rp {{ number_format($appetizer[1]->harga_menu, 0, ',', '.') }}</span>
                            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                        </div>
                    </div>
                </div>

                {{-- card 3 --}}
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                    <a href="#">
                        <img class="rounded-t-lg" src="/image/Risolsayur.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$appetizer[2]->nama_menu}}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                Stock
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$appetizer[2]->stok_menu}}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">Rp {{ number_format($appetizer[2]->harga_menu, 0, ',', '.') }}</span>
                            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                        </div>
                    </div>
                </div>

                    {{-- card 4 --}}
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                        <a href="#">
                            <img class="rounded-t-lg" src="/image/sandwich.jpg" alt="product image" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$appetizer[3]->nama_menu}}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    Stock
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$appetizer[3]->stok_menu}}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xl font-bold text-gray-900">Rp {{ number_format($appetizer[3]->harga_menu, 0, ',', '.') }}</span>
                                <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                            </div>
                        </div>
                    </div>
              </div>

            {{-- Minuman --}}
            <div class="appetizer-container my-10">
                <h1 class="text-3xl font-semibold text-primary py-4">Minuman</h1>
  
                <div class="card-appetizer flex flex-row gap-x-4">
  
                  {{-- card 1 --}}
                  <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                      <a href="#">
                          <img class="rounded-t-lg" src="/image/orange.jpg" alt="product image" />
                      </a>
                      <div class="px-5 pb-5">
                          <a href="#">
                              <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$minuman[0]->nama_menu}}</h5>
                          </a>
                          <div class="flex items-center mt-2.5 mb-5">
                              <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                  Stock
                              </div>
                              <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$minuman[0]->stok_menu}}</span>
                          </div>
                          <div class="flex items-center justify-between">
                              <span class="text-xl font-bold text-gray-900">Rp {{ number_format($minuman[0]->harga_menu, 0, ',', '.') }}</span>
                              <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                          </div>
                      </div>
                  </div>
  
                  {{-- card 2 --}}
                  <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                    <a href="#">
                        <img class="rounded-t-lg" src="/image/icedtea.jpg" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$minuman[1]->nama_menu}}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                Stock
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$minuman[1]->stok_menu}}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">Rp {{ number_format($minuman[1]->harga_menu, 0, ',', '.') }}</span>
                            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                        </div>
                    </div>
                </div>
  
                  {{-- card 3 --}}
                  <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                      <a href="#">
                          <img class="rounded-t-lg" src="/image/iceddlemon.jpg" alt="product image" />
                      </a>
                      <div class="px-5 pb-5">
                          <a href="#">
                              <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$minuman[2]->nama_menu}}</h5>
                          </a>
                          <div class="flex items-center mt-2.5 mb-5">
                              <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                  Stock
                              </div>
                              <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$minuman[2]->stok_menu}}</span>
                          </div>
                          <div class="flex items-center justify-between">
                              <span class="text-xl font-bold text-gray-900">Rp {{ number_format($minuman[2]->harga_menu, 0, ',', '.') }}</span>
                              <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                          </div>
                      </div>
                  </div>
  
                      {{-- card 4 --}}
                      <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-fit">
                          <a href="#">
                              <img class="rounded-t-lg" src="/image/strawberry.jpg" alt="product image" />
                          </a>
                          <div class="px-5 pb-5">
                              <a href="#">
                                  <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mt-5">{{$minuman[3]->nama_menu}}</h5>
                              </a>
                              <div class="flex items-center mt-2.5 mb-5">
                                  <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                      Stock
                                  </div>
                                  <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$minuman[3]->stok_menu}}</span>
                              </div>
                              <div class="flex items-center justify-between">
                                  <span class="text-xl font-bold text-gray-900">Rp {{ number_format($minuman[3]->harga_menu, 0, ',', '.') }}</span>
                                  <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Beli</a>
                              </div>
                          </div>
                      </div>
                </div>
          </div>
      </div>
    </main>
@endsection