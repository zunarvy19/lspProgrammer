<?php

namespace App\Http\Controllers;

use App\Models\products;

use App\Models\menus;
use App\Models\orders;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index(){

        $products = products::count();
        $menus = menus::count();
        
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ], compact('products', 'menus'));
    }

    public function indexKasir(){
        $order = orders::count();
        $products = products::count();
        $menus = menus::count();

        return view('kasir.dashboard', [
            'title' => 'Dashboard Kasir',
            'order' => $order,
            'products' => $products,
            'menus' => $menus
        ]);
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
        
        $request->validate([
            'status' => 'required|in:' . implode(',', orders::$statuses),
        ]);

        // Update status order
        $order->update(['status' => $request->input('status')]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Status order #' . $order->id . ' berhasil diperbarui!');
    }

    public function destroy(orders $order)
    {
        try {
            // Berkat onDelete('cascade') di migrasi, semua order_details
            // yang terkait dengan pesanan ini akan terhapus secara otomatis.
            $order->delete();

            return redirect()->route('admin.dataOrder')->with('success', 'Pesanan #' . $order->id . ' berhasil dihapus secara permanen.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus pesanan.');
        }
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

public function generateInvoice($id)
{
    $user = Auth::user();

    // Mulai query dasar
    $query = orders::with('details.menu', 'user');

    // JIKA PENGGUNA BUKAN ADMIN DAN BUKAN KASIR (yaitu user biasa)
    if (!$user->isAdmin() && !$user->isKasir()) {
        // Maka tambahkan syarat bahwa ia hanya boleh mengakses order miliknya sendiri
        $query->where('user_id', $user->id);
    }

    // Lanjutkan query untuk mencari order berdasarkan ID yang diminta
    // Jika user biasa mencoba akses order orang lain, query akan gagal di sini
    $order = $query->findOrFail($id);

    // Proses pembuatan PDF tetap sama
    $pdf = Pdf::loadView('order.invoice', ['order' => $order]);
    return $pdf->download('invoice-order-' . $order->id . '.pdf');
}
}
