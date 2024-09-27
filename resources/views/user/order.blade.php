@extends('layouts.navbar')

@section('main')
<div class="sm:w-[70%] my-32 flcx h-auto justify-center flex-col mx-auto mb-10 bg-white px-5">
  <div class="">
      <p class="sm:text-5xl text-3xl pt-10 font-bold text-start">Pesan Sekarang!</p>
      <hr class="border-4 border-secondary my-4 w-[15%] ">
  </div>  
    
    <div class="container mx-auto mt-10">
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col mx-auto md:flex md:flex-col rounded-2xl bg-white">
                
                <!-- Section: Makanan Utama -->
                <div>
                    <h2 class="text-xl font-bold mb-4">Makanan Utama</h2>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Makanan</label>
                            <select class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded" id="main_course" name="menu[main_course][id]" required>
                                <option value="">Pilih Makanan Utama</option>
                                @foreach ($menus->where('id_products', 1) as $menu)
                                    <option value="{{ $menu->id }}" data-price="{{ $menu->harga_menu }}">{{ $menu->nama_menu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Harga Makanan</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3" id="main_course_price" name="menu[main_course][price]" type="text" readonly>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jumlah</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4" id="main_course_qty" name="menu[main_course][quantity]" type="number" min="1" value="1">
                        </div>
                    </div>
                </div>
        
                <!-- Section: Minuman -->
                <div>
                    <h2 class="text-xl font-bold mb-4">Minuman</h2>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Minuman</label>
                            <select class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded" id="drink" name="menu[drink][id]" required>
                                <option value="">Pilih Minuman</option>
                                @foreach ($menus->where('id_products', 3) as $menu)
                                    <option value="{{ $menu->id }}" data-price="{{ $menu->harga_menu }}">{{ $menu->nama_menu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Harga Minuman</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3" id="drink_price" name="menu[drink][price]" type="text" readonly>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jumlah</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4" id="drink_qty" name="menu[drink][quantity]" type="number" min="1" value="1">
                        </div>
                    </div>
                </div>
        
                <!-- Section: Appetizer -->
                <div>
                    <h2 class="text-xl font-bold mb-4">Appetizer</h2>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Appetizer</label>
                            <select class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded" id="appetizer" name="menu[appetizer][id]" required>
                                <option value="">Pilih Appetizer</option>
                                @foreach ($menus->where('id_products', 2) as $menu)
                                    <option value="{{ $menu->id }}" data-price="{{ $menu->harga_menu }}">{{ $menu->nama_menu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Harga Appetizer</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3" id="appetizer_price" name="menu[appetizer][price]" type="text" readonly>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jumlah</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4" id="appetizer_qty" name="menu[appetizer][quantity]" type="number" min="1" value="1">
                        </div>
                    </div>
                </div>
        
                <!-- Section: Total Harga -->
                <div class="mt-6">
                    <h2 class="text-xl font-bold mb-4">Total Harga</h2>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Total</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4" id="total_price" name="total_price" type="text" readonly>
                        </div>
        
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Metode Pembayaran</label>
                            <select class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded" id="metode_pembayaran" name="metode_order" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="tunai">Tunai</option>
                                <option value="non-tunai">Non Tunai</option>
                            </select>
                        </div>                        
                    </div>                     
                </div>
        
                <!-- Section: Catatan -->
                <div class="mt-4 flex flex-col justify-between items-center">
                    <p class="text-sm text-gray-600">
                        <strong>Catatan:</strong> Jika memilih metode tunai, pembayaran dilakukan saat makanan tiba. Untuk metode non-tunai, harap transfer ke rekening BCA berikut: <strong>0138 1234 5678</strong>.
                    </p>
                    <!-- Submit Button -->
                    <button type="submit" class="bg-secondary text-white py-2 px-5 rounded-lg ">Submit Order</button>
                </div>
            </div>
        </form>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('message'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('message') }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <script>
function calculateTotal() {
    // Ambil harga dan kuantitas dari makanan utama
    const mainCoursePrice = parseFloat(document.getElementById('main_course_price').value) || 0;
    const mainCourseQty = parseInt(document.getElementById('main_course_qty').value) || 1;
    
    // Ambil harga dan kuantitas dari minuman
    const drinkPrice = parseFloat(document.getElementById('drink_price').value) || 0;
    const drinkQty = parseInt(document.getElementById('drink_qty').value) || 1;
    
    // Ambil harga dan kuantitas dari appetizer
    const appetizerPrice = parseFloat(document.getElementById('appetizer_price').value) || 0;
    const appetizerQty = parseInt(document.getElementById('appetizer_qty').value) || 1;

    // Hitung total harga
    const totalPrice = (mainCoursePrice * mainCourseQty) + (drinkPrice * drinkQty) + (appetizerPrice * appetizerQty);

    // Tampilkan hasil total harga
    document.getElementById('total_price').value = totalPrice.toFixed(2);
}

// Update input harga saat menu dipilih
document.getElementById('main_course').addEventListener('change', function() {
    const selected = this.options[this.selectedIndex];
    document.getElementById('main_course_price').value = selected.getAttribute('data-price');
    calculateTotal(); // Hitung ulang total
});

document.getElementById('drink').addEventListener('change', function() {
    const selected = this.options[this.selectedIndex];
    document.getElementById('drink_price').value = selected.getAttribute('data-price');
    calculateTotal(); // Hitung ulang total
});

document.getElementById('appetizer').addEventListener('change', function() {
    const selected = this.options[this.selectedIndex];
    document.getElementById('appetizer_price').value = selected.getAttribute('data-price');
    calculateTotal(); // Hitung ulang total
});

// Update total harga saat kuantitas diubah
document.getElementById('main_course_qty').addEventListener('input', function() {
    calculateTotal(); // Hitung ulang total
});

document.getElementById('drink_qty').addEventListener('input', function() {
    calculateTotal(); // Hitung ulang total
});

document.getElementById('appetizer_qty').addEventListener('input', function() {
    calculateTotal(); // Hitung ulang total
});

</script>
    
  </div>
</div>
@endsection