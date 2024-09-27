<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\orderItems;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\menus;
use Illuminate\Support\Facades\Auth;


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

    public function pesanan(){
        return view('user.pesanan', [
            'title'=> 'Pesanan Saya'
        ]);
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
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Validasi request
        $validated = $request->validate([
            'menu' => 'required|array',
            'menu.*.id' => 'required|exists:menus,id',
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
        $order->id_user = $user->id;
        $order->total_price = $totalPrice;
        $order->metode_order = $validated['metode_order'];
        $order->tanggal_order = now();
        $order->save();

        // Simpan item-item yang dipesan ke order_items
        foreach ($validated['menu'] as $item) {
            $orderItem = new OrderItems();
            $orderItem->order_id = $order->id;
            $orderItem->menu_id = $item['id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }

        // Redirect ke halaman sukses
        return redirect()->route('order.success')->with('message', 'Order berhasil dibuat!');
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
