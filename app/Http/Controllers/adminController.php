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
        return view('admin.dataMenu',data: [
            'title' => 'Daftar Menu'
        ]);
    }

    public function dataOrder()
    {
        $orders = orders::with('user')->latest()->get();

        return view('admin.dataOrder', [ 
            'title' => 'Laporan Data Order',
            'orders' => $orders
        ]);
    }

        public function updateStatus(Request $request, orders $order)
    {
        // Validasi input 'status' (bukan 'status_order')
        $request->validate([
            'status' => 'required|in:diterima,diproses,Siap Ambil,Sudah Bayar,dibatalkan',
        ]);

        // Update status order
        $order->update(['status' => $request->input('status')]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Status order #' . $order->id . ' berhasil diperbarui!');
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
