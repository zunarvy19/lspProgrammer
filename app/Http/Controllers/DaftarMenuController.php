<?php

namespace App\Http\Controllers;

use App\Models\menus;
use Illuminate\Http\Request;

class DaftarMenuController extends Controller
{
    public function daftarmenu()
    {
        $makutama = menus::with('products')->where('id_products', 1)->get();
        $appetizer = menus::with('products')->where('id_products', 2)->get();
        $minuman = menus::with('products')->where('id_products', 3)->get();

        return view('user.daftarMenu', [
            'title'     => 'Daftar Menu',
            'makutama'  => $makutama,
            'appetizer' => $appetizer,
            'minuman'   => $minuman,
        ]);
    }
}
