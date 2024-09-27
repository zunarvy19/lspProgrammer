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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_user');
            $table->enum('status_order', ['diproses', 'dikirim', 'selesai']);
            $table->dateTime('tanggal_order');
            $table->decimal('total_biaya', 8, 2);
            $table->string('metode_order');
            $table->timestamps();

            //foreign keys
            $table->foreign('id_menu')->references('id')->on('menuses')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
