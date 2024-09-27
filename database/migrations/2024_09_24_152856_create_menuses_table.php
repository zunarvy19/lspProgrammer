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
        Schema::create('menuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_products');
            $table->string("nama_menu", 20);
            $table->decimal("harga_menu",  10);
            $table->integer("stok_menu");
            $table->timestamps();

            // foreign key
            $table->foreign('id_products')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menuses');
    }
};
