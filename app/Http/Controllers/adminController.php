<?php

namespace App\Http\Controllers;

use App\Models\products;

use App\Models\menus;
use App\Models\orders;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function dataOrder(){

        $orders = Orders::with('user')->get();
        // dd($orders);
        return view('admin.dataOrder',[
            'title' => "Data Order",
            'orders' => $orders,
        ]);
    }

    public function cetakPDF()
    {
        // Ambil data pesanan dari database
        $orders = Orders::with('user')->get();
        
        // dd($orders);        
        $pdf = Pdf::loadView('admin.laporanPenjualan', compact('orders'));
        
        // Unduh file PDF
        return $pdf->download('laporan_penjualan.pdf');
    }
}
