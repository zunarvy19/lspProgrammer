<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/daftar-menu', [OrdersController::class, "daftarmenu"])->name('user.daftarmenu');
    Route::put('/admin/update-status/{id}', [OrdersController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::get('/pesanan-saya', [OrdersController::class, "pesanan"])->name('user.pesanan');
    Route::get('/pesan-sekarang', [OrdersController::class, 'order'])->name( 'user.order');
    Route::post('/pesan', [OrdersController::class, 'store'])->name('user.store');
    Route::get('/dummy', [OrdersController::class, 'dummy'])->name('user.dummy');
    Route::get('/order/{id}/invoice', [OrdersController::class, 'generateInvoice'])->name('order.invoice');





    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [adminController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/admin/menu', [adminController::class, 'menu'])->name('admin.dataMenu');
        Route::get('/admin/data-order', [adminController::class, 'dataOrder'])->name('admin.dataOrder');
        Route::get('/admin/makutama', [MenusController::class, 'makutama'])->name('admin.makutama');
        Route::put('/update-mutama/{id}', [MenusController::class, 'updateStok'])->name('update.stok');
        Route::get('/admin/appetizer', [MenusController::class, 'appetizer'])->name('admin.appetizer');
        Route::get('/admin/minuman', [MenusController::class, 'minuman'])->name('admin.minuman');
        Route::get('/admin/{id}/create', [MenusController::class, 'create'])->name('admin.create');
        Route::post('/admin/{id}', [MenusController::class, 'store'])->name('admin.store');
        Route::get('/admin/cetak-pdf', [AdminController::class, 'cetakpdf'])->name('admin.cetakpdf');

    });
});


require __DIR__.'/auth.php';
