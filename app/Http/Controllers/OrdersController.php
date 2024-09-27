<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\menus;
use App\Http\Requests\StoreordersRequest;
use App\Http\Requests\UpdateordersRequest;

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
    public function store(StoreordersRequest $request)
    {
        //
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
    public function update(UpdateordersRequest $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
