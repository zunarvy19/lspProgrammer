<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            
            // Foreign key ke tabel 'orders'
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            
            // Foreign key ke tabel 'menus'
            $table->foreignId('menu_id')->constrained('menuses')->onDelete('cascade');

            // Jumlah item menu yang dipesan
            $table->integer('quantity');

            // Harga menu PADA SAAT dipesan (untuk arsip)
            $table->decimal('price', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};