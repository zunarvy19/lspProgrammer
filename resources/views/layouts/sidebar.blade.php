<!doctype html>
<html class="scroll-smooth">

<head>
   <title> {{$title}} || Admin</title>
   <meta charset="utf-8">
   {{-- <title>{{$title}}</title> --}}
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="/img/frame2.png" />
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
</head>

<body>



   <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
               <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                  type="button"
                  class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                  <span class="sr-only">Open sidebar</span>
                  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                     </path>
                  </svg>
               </button>
               <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                  <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-black">Heaven
                     Dining</span>
               </a>
            </div>
            <div class="flex items-center">
               <div class="flex items-center ms-3">
                  <div>
                     <button type="button" class="flex  focus:ring-4 focus:ring-gray-300 " aria-expanded="false"
                        data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <span class="font-semibold">{{Auth::user()->name}} </span>
                     </button>
                  </div>
                  <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow "
                     id="dropdown-user">
                     <div class="px-4 py-3" role="none">
                        <p class="text-sm text-gray-900 " role="none">
                           {{Auth::user()->name}}
                        </p>
                        <p class="text-sm font-medium text-gray-900 truncate " role="none">
                           {{Auth::user()->email}}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </nav>

   <aside id="logo-sidebar"
      class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
      aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
         <ul class="space-y-2 font-medium">

            {{--============================================
            MENU HANYA UNTUK ADMIN
            ============================================ --}}
            @if(auth()->user()->isAdmin())
            <li>
               <a href="{{ route('admin.dashboard.index') }}"
                 class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path
                     d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                   <path
                     d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                 </svg>
                 <span class="ms-3">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="{{ route('admin.dataMenu') }}"
                 class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                   <path
                     d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                 </svg>
                 <span class="flex-1 ms-3 whitespace-nowrap">Data Menu</span>
               </a>
            </li>
         @endif

            @if (auth()->user()->isKasir())
            <li>
               <a href="{{ route('kasir.dashboard') }}"
                 class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path
                     d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                   <path
                     d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                 </svg>
                 <span class="ms-3">Dashboard Kasir</span>
               </a>
            </li>
         @endif

            @if (auth()->user()->isKitchenStaff())
            <li>
               <a href="{{ route('kitchen.dashboard') }}"
                 class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path
                     d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                   <path
                     d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                 </svg>
                 <span class="ms-3">Staff Kithcen</span>
               </a>
            </li>
         @endif

            {{--===================================================================
            MENU UNTUK ADMIN, KASIR, DAN STAFF KITCHEN
            ==================================================================== --}}
            @if (auth()->user()->canManageOrders())
            <li>
               {{-- Arahkan semua peran yang diizinkan ke SATU route yang sama --}}
               <a href="{{ route('admin.dataOrder') }}"
                 class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                 </svg>
                 <span class="flex-1 ms-3 whitespace-nowrap">Data Order</span>
               </a>
            </li>
         @endif

            {{-- ... Anda bisa menambahkan menu lain untuk Kasir di sini ... --}}
            {{-- @if(auth()->user()->isKasir() || auth()->user()->isAdmin())
            <li>
               <a href="#">Laporan Penjualan</a>
            </li>
            @endif --}}


            {{--============================================
            TOMBOL LOGOUT (Selalu ada untuk semua peran)
            ============================================ --}}
            <li>
               {{-- Form logout dibuat lebih sederhana --}}
               <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                  @csrf
                  <a href="{{ route('logout') }}" id="logoutLink"
                     onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                     class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                     <svg class="w-5 h-5 text-gray-500 transition duration-75" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                           d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                  </a>
               </form>
            </li>

         </ul>
      </div>
   </aside>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
      // Script logout dipindahkan ke sini agar lebih rapi
      document.addEventListener('DOMContentLoaded', function () {
         // Cek jika elemennya ada sebelum menambahkan listener
         const logoutLink = document.getElementById('logoutLink');
         if (logoutLink) {
            logoutLink.addEventListener('click', function (event) {
               event.preventDefault(); // Mencegah link berpindah halaman
               Swal.fire({
                  title: 'Konfirmasi Logout',
                  text: 'Apakah Anda yakin ingin keluar?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Logout!',
                  cancelButtonText: 'Batal'
               }).then((result) => {
                  if (result.isConfirmed) {
                     // Jika dikonfirmasi, submit form logout
                     document.getElementById('logoutForm').submit();
                  }
               });
            });
         }
      });
   </script>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <div class="">
      @yield('main')
   </div>
</body>

</html>