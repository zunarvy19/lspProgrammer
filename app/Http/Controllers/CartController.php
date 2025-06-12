<?php

namespace App\Http\Controllers;

use App\Models\menus;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function add(menus $menu)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$menu->id])) {
            $cart[$menu->id]['quantity']++;
        } else {
            $cart[$menu->id] = [
                "nama_menu" => $menu->nama_menu,
                "quantity" => 1,
                "harga_menu" => $menu->harga_menu,
                "gambar_menu" => $menu->gambar_menu,
            ];
        }
        session()->put('cart', $cart);
        return response()->json(['message' => 'Item berhasil ditambahkan!']);
    }

    public function get()
    {
        $cart = session()->get('cart', []);
        $notes = session()->get('cart_notes', ''); 
        return response()->json([
            'cart' => $cart,
            'notes' => $notes
        ]);
    }

    public function updateNotes(Request $request)
    {
        // Simpan catatan ke session
        session()->put('cart_notes', $request->input('notes'));
        return response()->json(['message' => 'Catatan berhasil disimpan.']);
    }

    // Method remove() tetap sama
    public function remove(menus $menu)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$menu->id])) {
            unset($cart[$menu->id]);
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Item berhasil dihapus!']);
    }

    // Method update() untuk item tidak lagi dibutuhkan untuk deskripsi
    // Bisa dihapus jika tidak ingin ada update kuantitas dari modal
    public function update(Request $request, menus $menu)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$menu->id])) {
            $cart[$menu->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Kuantitas berhasil diperbarui!']);
    }
}