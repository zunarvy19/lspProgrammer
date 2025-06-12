<?php

namespace App\Http\Controllers;

use App\Models\menus;
use App\Models\orders; 
use App\Models\OrderDetail; // Gunakan nama model singular 'OrderDetail'
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdersController extends Controller
{
    /**
     * Menampilkan halaman riwayat pesanan milik pengguna yang sedang login.
     * (Sebelumnya method 'pesanan' dan 'dummy')
     */
    public function pesanan()
    {
        $orders = orders::with('details.menu') // Eager load relasi untuk performa
                       ->where('user_id', Auth::id())
                       ->latest() // Urutkan dari yang terbaru
                       ->get();

        return view('user.pesanan', [
            'title' => 'Pesanan Saya',
            'orders' => $orders
        ]);
    }

    /**
     * Menampilkan halaman review pesanan (checkout) berdasarkan isi keranjang.
     * (Sebelumnya method 'order')
     */
    public function order()
    {
        // dd(session()->get('cart_notes')); 
        $cartItems = session()->get('cart', []);
        $cartNotes = session()->get('cart_notes', '');

        if (empty($cartItems)) {
            return redirect()->route('user.daftarMenu')->with('info', 'Keranjang Anda kosong, silakan pilih menu.');
        }

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['quantity'] * $item['harga_menu'];
        }

        return view('user.order', [
            'title' => 'Review Pesanan',
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'cartNotes' => $cartNotes,
        ]);
    }

    /**
     * Memvalidasi dan menyimpan pesanan dari keranjang ke database.
     * (Sebelumnya method 'store' Anda)
     */
    public function store(Request $request)
    {
        $request->validate([
            'notes'         => 'nullable|string|max:1000',
            'metode_order'  => 'required|in:tunai,non-tunai',
        ]);
        
        $cartItems = session()->get('cart', []);
        //  dd($cartItems); 
        if (empty($cartItems)) {
            return redirect()->route('user.daftarMenu')->with('error', 'Tidak bisa memproses pesanan karena keranjang kosong.');
        }

        try {
            //  Transaction untuk memastikan integritas data
            $order = DB::transaction(function () use ($request, $cartItems) {
                // Ambil harga total dari keranjang, bukan dari form, untuk keamanan
                $totalPrice = 0;
                foreach ($cartItems as $item) {
                    $totalPrice += $item['quantity'] * $item['harga_menu'];
                }

                $createdOrder = orders::create([
                    'user_id'       => Auth::id(),
                    'total_biaya'   => $totalPrice,
                    'metode_order'  => $request->metode_order,
                    'notes'         => $request->notes,
                    'status'        => 'Diterima',
                ]);

                
                foreach ($cartItems as $menuId => $details) {
                    $menu = menus::find($menuId);

                //     dd([
                //     'menuId_dari_keranjang' => $menuId,
                //     'details_dari_keranjang' => $details,
                //     'hasil_pencarian_menu' => $menu,
                //     'apakah_stok_cukup' => $menu ? ($menu->stok_menu >= $details['quantity']) : 'Menu tidak ditemukan'
                // ]);
                    if ($menu && $menu->stok_menu >= $details['quantity']) {
                        $createdOrder->details()->create([
                            'menu_id'   => $menuId,
                            'quantity'  => $details['quantity'],
                            'price'     => $menu->harga_menu, 
                        ]);
                        // Kurangi stok
                        $menu->decrement('stok_menu', $details['quantity']);
                    } else {
                        // Jika ada item yg stoknya habis, gagalkan seluruh transaksi
                        throw new \Exception("Stok untuk menu '{$menu->nama_menu}' tidak mencukupi.");
                    }
                }

                return $createdOrder;
            });

            // If transaksi berhasil, kosongkan keranjang
            session()->forget(['cart', 'cart_notes']);

            return redirect()->route('user.pesanan')->with('success', 'Pesanan Anda dengan ID #' . $order->id . ' berhasil dibuat!');

        } catch (\Exception $e) {
            // return back()->with('error', $e->getMessage());
             dd($e);
        }
    }

    /**
     * Menghasilkan invoice PDF untuk pesanan tertentu.
     */
public function generateInvoice($id)
{
    // Pastikan kita mengambil relasi 'user' dengan method with()
    // Ini akan mengisi properti $order->user
    $order = orders::with('details.menu', 'user')
                  ->where('user_id', Auth::id()) // Pengecekan keamanan, hanya pemilik yang bisa unduh
                  ->findOrFail($id);

    $pdf = Pdf::loadView('order.invoice', ['order' => $order]); 

    return $pdf->download('invoice-order-' . $order->id . '.pdf');
}
}