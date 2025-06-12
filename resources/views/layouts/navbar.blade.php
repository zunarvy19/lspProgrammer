<!doctype html>
<html class="scroll-smooth">

<head>
  <title>{{$title}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-[#FFF4EA]">



  <nav class="bg-white shadow-lg  fixed top-0 w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="" class="flex items-center lg:space-x-1 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap italic text-[#78ABA8]">HVD</span>
      </a>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button" id="cart-button" class="relative p-2 text-gray-700 hover:text-black">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c.51 0 .962-.328 1.09-.828l2.919-9.567a1.125 1.125 0 0 0-1.081-1.282H5.498L5.11 3.242A1.125 1.125 0 0 0 4.022 2.25H2.25" />
          </svg>
          {{-- Badge untuk jumlah item --}}
          <span id="cart-count"
            class="absolute -top-1 -right-1 bg-red-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
        </button>
        @auth
      <button type="button" class="flex text-sm md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
        data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="size-6 block">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>

      </button>
      <div
        class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
        id="user-dropdown">
        <div class="px-4 py-3">
        <span class="block text-sm text-gray-900 dark:text-white">{{Auth::user()->name}}</span>
        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
        </div>
        <ul>
        <li>
          <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="flex items-center">
          @csrf
          <x-dropdown-link href="{{route('logout')}}" id="logoutLink" class="flex items-center -ml-2">
            <span class="text-gray-900">
            {{ __('Log Out') }}
            </span>
          </x-dropdown-link>
          </form>
        </li>
        </ul>
      </div>
    @else
      <a href="{{Route('signin')}}" type="button"
        class="flex text-white bg-black hover:opacity-60 duration-100 focus:ring-4 focus:ring-white font-medium rounded-lg text-sm px-5 py-2.5"
        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
        data-dropdown-placement="bottom">
        Login
        <span class="sr-only">Open user menu</span>
      </a>
    @endauth
        <!-- Dropdown menu -->
        <button data-collapse-toggle="navbar-user" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul
          class="flex flex-col font-medium md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md: dark:border-gray-700">
          <li>
            <a href="/daftar-menu"
              class="text-lg block py-2 px-3  relative transition-transform transform hover:-translate-y-1 duration-200 ease-in-out">Daftar
              Menu</a>
          </li>
          <li>
            <a href="/orders/create"
              class="text-lg block py-2 px-3  relative transition-transform transform hover:-translate-y-1 duration-200 ease-in-out">Pesan
              Sekarang</a>
          </li>
          <li>
            <a href="/orders"
              class="text-lg block py-2 px-3  relative transition-transform transform hover:-translate-y-1 duration-200 ease-in-out">Pesanan
              Saya</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('main')

  <script type="module">
    /**
     * @file Manages all client-side shopping cart interactions.
     * @author Your Name
     * @version 1.1.0
     */

    // =================================================================
    //  STATE & DOM ELEMENTS
    //  All required DOM elements are fetched once for performance.
    // =================================================================

    const dom = {
      cartButton: document.getElementById('cart-button'),
      cartModal: document.getElementById('cart-modal'),
      modalPanel: document.getElementById('modal-panel'),
      cartOverlay: document.getElementById('cart-overlay'),
      closeModalButton: document.getElementById('close-modal-button'),
      cartCount: document.getElementById('cart-count'),
      cartItemsContainer: document.getElementById('cart-items-container'),
      cartTotalPrice: document.getElementById('cart-total-price'),
      addToCartButtons: document.querySelectorAll('.add-to-cart-btn'),
      orderNotesTextarea: document.getElementById('cart-order-notes'),
      checkoutButton: document.getElementById('checkout-button')
    };


    // =================================================================
    //  HELPER FUNCTIONS
    // =================================================================

    /**
     * Prevents a function from being called too frequently.
     * Useful for events like 'input' or 'resize' to reduce server requests.
     * @param {Function} func The function to debounce.
     * @param {number} delay Delay in milliseconds.
     * @returns {Function} The debounced function.
     */
    function debounce(func, delay = 500) {
      let timeout;
      return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
      };
    }


    // =================================================================
    //  UI (VIEW) LOGIC
    // =================================================================

    /**
     * Opens the shopping cart modal with a slide-in animation.
     */
    function openModal() {
      updateCartView(); // Always refresh content when opening.
      dom.cartModal.classList.remove('hidden');
      requestAnimationFrame(() => {
        dom.modalPanel.classList.remove('translate-x-full');
      });
    }

    /**
     * Closes the shopping cart modal with a slide-out animation.
     */
    function closeModal() {
      dom.modalPanel.classList.add('translate-x-full');
      setTimeout(() => {
        dom.cartModal.classList.add('hidden');
      }, 300); // Must match CSS transition duration.
    }

    /**
     * Renders the entire cart UI based on data from the server.
     * This function is responsible for updating the DOM.
     * @param {object} cart - The cart object containing items.
     * @param {string} notes - The order notes string.
     */
    function renderCart(cart, notes) {
      let totalItems = 0;
      let totalPrice = 0;
      dom.cartItemsContainer.innerHTML = ''; // Clear previous items.

      if (Object.keys(cart).length === 0) {
        dom.cartItemsContainer.innerHTML = '<p class="text-gray-500 text-center">Keranjang Anda kosong.</p>';
        dom.checkoutButton.classList.add('hidden');
      } else {
        dom.checkoutButton.classList.remove('hidden');
        for (const key in cart) {
          const item = cart[key];
          totalItems += item.quantity;
          totalPrice += item.quantity * item.harga_menu;

          const itemElement = document.createElement('div');
          itemElement.className = 'flex items-center justify-between py-3 border-b';
          itemElement.innerHTML = `
                    <div class="flex items-center overflow-hidden pr-2">
                        <img src="${item.gambar_menu ? '/storage/' + item.gambar_menu : '/image/placeholder.png'}" alt="${item.nama_menu}" class="w-16 h-16 object-cover rounded mr-4 flex-shrink-0">
                        <div class="flex-grow">
                            <h3 class="font-semibold truncate">${item.nama_menu}</h3>
                            <p class="text-sm text-gray-500">${item.quantity} x Rp ${new Intl.NumberFormat('id-ID').format(item.harga_menu)}</p>
                        </div>
                    </div>
                    <button data-id="${key}" class="remove-item-btn text-red-500 hover:text-red-700 text-sm font-semibold p-2 flex-shrink-0">Hapus</button>
                `;
          dom.cartItemsContainer.appendChild(itemElement);
        }
      }

      dom.cartCount.textContent = totalItems;
      dom.cartTotalPrice.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(totalPrice);
      dom.orderNotesTextarea.value = notes;
    }


    // =================================================================
    //  API INTERACTIONS (CONTROLLER LOGIC)
    // =================================================================

    /**
     * Fetches cart data from the server and triggers a UI update.
     * This is the main "controller" function for the cart view.
     */
    async function updateCartView() {
      try {
        const response = await axios.get("{{ route('cart.get') }}");
        renderCart(response.data.cart, response.data.notes);
      } catch (error) {
        console.error('Failed to fetch cart data:', error);
        dom.cartItemsContainer.innerHTML = '<p class="text-red-500 text-center">Gagal memuat keranjang.</p>';
      }
    }

    /**
     * Sends a request to add an item to the cart.
     * @param {string} menuId - The ID of the menu item to add.
     */
    async function addToCart(menuId) {
      try {
        await axios.post(`/cart/add/${menuId}`);
        Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: 'Berhasil ditambahkan!', showConfirmButton: false, timer: 1500 });
        updateCartView();
      } catch (error) {
        console.error('Failed to add item to cart:', error);
        Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: 'Gagal menambahkan item.', showConfirmButton: false, timer: 1500 });
      }
    }

    /**
     * Sends a request to remove an item from the cart.
     * @param {string} menuId - The ID of the menu item to remove.
     */
    async function removeCartItem(menuId) {
      try {
        await axios.post(`/cart/remove/${menuId}`);
        updateCartView();
      } catch (error) {
        console.error('Failed to remove item from cart:', error);
      }
    }

    /**
     * Sends a debounced request to update the order notes.
     */
    const updateOrderNotes = debounce(async () => {
      try {
        await axios.post("{{ route('cart.notes.update') }}", {
          notes: dom.orderNotesTextarea.value
        });
      } catch (error) {
        console.error('Failed to save order notes:', error);
      }
    });


    // =================================================================
    //  EVENT LISTENERS & INITIALIZATION
    // =================================================================

    // Initialize event listeners for static elements.
    dom.cartButton.addEventListener('click', openModal);
    dom.closeModalButton.addEventListener('click', closeModal);
    dom.cartOverlay.addEventListener('click', closeModal);
    dom.orderNotesTextarea.addEventListener('input', updateOrderNotes);

    dom.addToCartButtons.forEach(button => {
      button.addEventListener('click', () => addToCart(button.dataset.id));
    });

    dom.cartItemsContainer.addEventListener('click', (event) => {
      const removeButton = event.target.closest('.remove-item-btn');
      if (removeButton) {
        const menuId = removeButton.dataset.id;
        Swal.fire({
          title: 'Anda yakin?',
          text: "Item ini akan dihapus dari keranjang.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            removeCartItem(menuId);
          }
        });
      }
    });

    // Fetch initial cart data when the page loads.
    document.addEventListener('DOMContentLoaded', updateCartView);

  </script>

  <div id="cart-modal" class="hidden">
    <div id="cart-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <div id="modal-panel"
      class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-lg z-50 flex flex-col transform transition-transform duration-300 ease-in-out translate-x-full">

      <div class="flex justify-between items-center p-4 border-b flex-shrink-0">
        <h2 class="text-xl font-semibold">Keranjang Belanja</h2>
        <button id="close-modal-button" class="text-gray-500 hover:text-gray-800 text-3xl">&times;</button>
      </div>

      <div id="cart-items-container" class="p-4 overflow-y-auto flex-grow">
        <p class="text-gray-500 text-center">Memuat keranjang...</p>
      </div>

      <div class="p-4 border-t space-y-4 bg-gray-50 flex-shrink-0">
        <div>
          <label for="cart-order-notes" class="block text-sm font-medium text-gray-700">Catatan Pesanan</label>
          <textarea id="cart-order-notes" rows="2"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="Contoh: Tolong antarkan ke lobi, pakai sedikit es..."></textarea>
        </div>

        <div class="flex justify-between items-center">
          <span class="text-lg font-semibold">Total:</span>
          <span id="cart-total-price" class="text-lg font-bold">Rp 0</span>
        </div>
        <a href="{{ route('user.order') }}" id="checkout-button"
          class="block w-full text-center bg-blue-700 text-white py-3 rounded-lg hover:bg-blue-800 transition-colors">
          Lanjut ke Pembayaran
        </a>
      </div>
    </div>
  </div>
</body>

</html>