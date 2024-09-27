<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Menghapus kolom 'id_menu'
            $table->dropForeign(['id_menu']); // Hapus foreign key jika ada
            $table->dropColumn('id_menu');    // Hapus kolom id_menu

            // Tidak ada perubahan lainnya pada id_user, status_order, tanggal_order, total_biaya, metode_order

            // Foreign key 'id_user' tetap sama
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Menambah kembali kolom 'id_menu'
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu')->references('id')->on('menus')->onDelete('cascade');
        });
    }
    
};
