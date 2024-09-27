<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\menus;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){

        $products = products::count();
        $menus = menus::count();
        
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ], compact('products', 'menus'));
    }

    public function menu(){
        return view('admin.dataMenu',[
            'title' => 'Daftar Menu'
        ]);
    }
}
