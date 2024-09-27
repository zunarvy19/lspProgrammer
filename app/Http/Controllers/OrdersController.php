<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\orderItems;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\menus;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daftarmenu()
    {
        $makutama = menus::with('products')->where('id_products', 1)->get();
        $appetizer = menus::with('products')->where('id_products', 2)->get();
        $minuman = menus::with('products')->where('id_products', 3)->get();

        // dd($makutama);
        return view('user.daftarmenu',[
            'title' => 'Daftar Menu'
        ], compact('makutama', 'appetizer', 'minuman'));
    }

    public function pesanan()
    {
        // Ambil pesanan user yang sedang login
        $orders = Orders::where('id_user', Auth()->user()->id)->get();
    
        // Ambil item pesanan yang terkait dengan pesanan tersebut
        $ordersitems = Orders::with('items.menu')->where('id_user', Auth()->user()->id)->get();
        // dd($ordersitems);
        // Kirim data ke view dengan array asosiatif
        return view('user.pesanan', [
            'title' => 'Pesanan Saya',
            'orders' => $orders,
            // 'ordersitems' => $ordersitems
        ]);
    }

    public function dummy(){
        $ordersitems = Orders::with('items.menu')->where('id_user', Auth()->user()->id)->get();
        // dd($ordersitems);
        return view('user.dummy', [
            'title' => 'Pesanan Saya',
            'ordersitems' => $ordersitems
        ]);
    }

    public function generateInvoice($id)
    {
        // Ambil order berdasarkan ID dengan relasi items dan menu
        $ordersitems = Orders::with('items.menu')->where('id', $id)->first();
    
        // Misalkan Anda ingin mengirimkan data ini dengan nama variabel yang berbeda
        $dataOrders = $ordersitems; // Menugaskan nilai ke variabel baru
    
        // Load view dengan data ordersitems
        $pdf = Pdf::loadView('order.invoice', compact('dataOrders')); // Menggunakan nama variabel yang baru
    
        // Menghasilkan PDF untuk di-download
        return $pdf->download('invoice-order-' . $dataOrders->id . '.pdf');
    }
    
    
    
    

    public function order(){
        $menus = menus::all();

        // dd($menus);
        return view('user.order',[
            'title' => 'Pesan Sekarang!'
        ], compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth()->user()->id; // Gunakan ID pengguna langsung
        
        // Validasi request
        $validated = $request->validate([
            'menu' => 'required|array',
            'menu.*.id' => 'required|exists:menuses,id',
            'menu.*.quantity' => 'required|integer|min:1',
            'menu.*.price' => 'required|numeric',
            'metode_order' => 'required|string',
        ]);
    
        // Hitung total harga
        $totalPrice = 0;
        foreach ($validated['menu'] as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
    
        // Buat order baru
        $order = new Orders();
        $order->id_user = $userId;
        $order->total_biaya = $totalPrice;
        $order->metode_order = $validated['metode_order'];
        $order->tanggal_order = now();
        $order->save();
    
        // Simpan item-item yang dipesan ke order_items dan kurangi stok menu
        foreach ($validated['menu'] as $item) {
            // Kurangi stok menu
            $menu = menus::find($item['id']);
            
            if ($menu->stok_menu >= $item['quantity']) {
                // Kurangi stok berdasarkan jumlah yang dipesan
                $menu->stok_menu -= $item['quantity'];
                $menu->save(); // Simpan perubahan stok ke database
    
                // Simpan item yang dipesan ke tabel order_items
                $orderItem = new OrderItems();
                $orderItem->order_id = $order->id;
                $orderItem->user_id = $userId;
                $orderItem->menu_id = $item['id'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->price = $item['price'];
                $orderItem->save();
            } else {
                // Jika stok tidak cukup, batalkan dan tampilkan pesan kesalahan
                return redirect()->back()->withErrors(['menu' => "Stok menu '{$menu->nama_menu}' tidak mencukupi."]);
            }
        }
    
        // Redirect ke halaman sukses
        return redirect()->route('user.order')->with('message', 'Order berhasil dibuat dan stok diperbarui!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateordersRequest $request, orders $orders)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
