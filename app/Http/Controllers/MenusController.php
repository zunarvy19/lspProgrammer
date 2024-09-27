<?php

namespace App\Http\Controllers;

use App\Models\menus;
use Illuminate\Http\Request;
use App\Http\Requests\StoremenusRequest;
use App\Http\Requests\UpdatemenusRequest;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function makutama(){
        $mutama = menus::with('products')->where('id_products', 1)->get();
        // dd($mutama);
        return view('admin.makutama',[
            'title' => 'Makanan Utama'
        ], compact('mutama'));
    }

    public function appetizer(){
        $appetizer = menus::with('products')->where('id_products', 2)->get();
        // dd($mutama);
        return view('admin.appetizer',[
            'title' => 'Appetizer'
        ], compact('appetizer'));
    }
    public function minuman(){
        $minuman = menus::with('products')->where('id_products', 3)->get();
        // dd($mutama);
        return view('admin.minuman',[
            'title' => 'Minuman'
        ], compact('minuman'));
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
    public function store(StoremenusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(menus $menus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menus $menus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStok(Request $request, $id)
    {

        // dd($request->all());
        // Validasi input stok
        $request->validate([
            'stok_menu' => 'required|integer|min:0',
        ]);

        // Temukan item makanan berdasarkan ID
        $mutama = menus::find($id);

        if (!$mutama) {
            return redirect()->back()->with('error', 'Makanan tidak ditemukan');
        }

        // Update stok
        $mutama->stok_menu = $request->stok_menu;
        $mutama->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Stok berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menus $menus)
    {
        //
    }
}
