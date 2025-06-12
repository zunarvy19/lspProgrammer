<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders;
use Carbon\Carbon; 
use Barryvdh\DomPDF\Facade\Pdf; 

class ReportController extends Controller
{
public function generatePdf(Request $request)
{
    $request->validate([
        'range' => 'required|in:daily,weekly,monthly',
    ]);

    $range = $request->range;
    $now = Carbon::now();
    
    $startDate = $now->copy()->startOfDay(); 
    
    $endDate = $now->copy()->endOfDay(); 
    $period_text = '';

    switch ($range) {
        case 'daily':

            $period_text = 'Harian (' . $now->translatedFormat('j F Y') . ')';
            break;
        case 'weekly':
            $startDate = $now->copy()->subDays(6)->startOfDay();
            $period_text = 'Mingguan (' . $startDate->translatedFormat('j M') . ' - ' . $endDate->translatedFormat('j M Y') . ')';
            break;
        case 'monthly':
            $startDate = $now->copy()->startOfMonth();
            $period_text = 'Bulanan (Bulan ' . $now->translatedFormat('F Y') . ')';
            break;
    }

    // 3. Fetch orders within the date range
    $orders = orders::with('user') // Use the correct model name 'Order'
                   ->whereBetween('created_at', [$startDate, $endDate])
                   ->where('status', 'Sudah bayar')
                   ->latest()
                   ->get();
    
    // 4. Aggregate data
    $totalRevenue = $orders->sum('total_biaya');
    $totalOrders = $orders->count();

    // Data for the PDF view
    $data = [
        'title' => 'Laporan Penjualan ' . $period_text,
        'period' => $period_text,
        'orders' => $orders,
        'totalRevenue' => $totalRevenue,
        'totalOrders' => $totalOrders,
    ];

    // 5. Generate PDF
    $pdf = Pdf::loadView('admin.laporanPenjualan', $data);

    // 6. Download PDF
    $filename = 'laporan-penjualan-' . $range . '-' . date('Y-m-d') . '.pdf';
    return $pdf->download($filename);
}
}