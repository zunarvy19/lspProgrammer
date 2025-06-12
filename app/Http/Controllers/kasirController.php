<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;

class kasirController extends Controller
{
    public function index(){
        $order = orders::count();

        return view('kasir.dashboard', [
            'title' => 'Dashboard Kasir',
            'order' => $order,
        ]);
    }

    public function kasirDataOrder()
    {
        $orders = orders::with('user')->latest()->get();

        return view('kasir.dataOrder', [ 
            'title' => 'Laporan Data Order',
            'orders' => $orders
        ]);
    }
}
