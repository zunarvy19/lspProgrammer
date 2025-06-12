<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
                
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
                
            $table->enum('status', ['Diterima', 'diproses', 'Siap Ambil', 'Sudah bayar'])->default('Diterima');
            
                
            $table->decimal('total_biaya', 10, 2); 
            
            
            $table->string('metode_order'); 
            
            
            $table->text('notes')->nullable();  

            $table->timestamps(); 

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};