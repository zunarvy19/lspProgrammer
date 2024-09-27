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
    Route::get('/pesanan-saya', [OrdersController::class, "pesanan"])->name('user.pesanan');





    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [adminController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/admin/menu', [adminController::class, 'menu'])->name('admin.dataMenu');
        Route::get('/admin/makutama', [MenusController::class, 'makutama'])->name('admin.makutama');
        Route::put('/update-mutama/{id}', [MenusController::class, 'updateStok'])->name('update.stok');
        Route::get('/admin/appetizer', [MenusController::class, 'appetizer'])->name('admin.appetizer');
        Route::get('/admin/minuman', [MenusController::class, 'minuman'])->name('admin.minuman');
    });
});


require __DIR__.'/auth.php';
