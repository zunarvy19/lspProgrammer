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
            // Ubah metode_order menjadi enum dengan pilihan tunai dan non-tunai
            $table->enum('metode_order', ['tunai', 'non-tunai'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Kembalikan perubahan jika migration di-rollback
            $table->string('metode_order')->change();
        });
    }
};
