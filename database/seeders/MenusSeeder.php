<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
        
            ['nama_menu'=> 'Spaghetti', 'harga_menu' => 25000.00, 'stok_menu' => 50, 'id_products' => 1],
            ['nama_menu'=> 'Rawon', 'harga_menu' => 15000.00, 'stok_menu' => 50, 'id_products' => 1],
            ['nama_menu'=> 'Ayam Bakar', 'harga_menu' => 15000.00, 'stok_menu' => 50, 'id_products' => 1],
            ['nama_menu'=> 'Udang Saus Padang', 'harga_menu' => 20000.00, 'stok_menu' => 50, 'id_products' => 1],

            ['nama_menu'=> 'Garlic Potato', 'harga_menu' => 20000.00, 'stok_menu' => 50, 'id_products' => 2],
            ['nama_menu'=> 'Salad', 'harga_menu' => 15000.00, 'stok_menu' => 50, 'id_products' => 2],
            ['nama_menu'=> 'Risol Sayur', 'harga_menu' => 20000.00, 'stok_menu' => 50, 'id_products' => 2],
            ['nama_menu'=> 'Sandwich', 'harga_menu' => 15000.00, 'stok_menu' => 50, 'id_products' => 2],

            ['nama_menu'=> 'Orange Juice', 'harga_menu' => 10000.00, 'stok_menu' => 50, 'id_products' => 3],
            ['nama_menu'=> 'Iced Tea', 'harga_menu' => 10000.00, 'stok_menu' => 50, 'id_products' => 3],
            ['nama_menu'=> 'Iced Lemon', 'harga_menu' => 10000.00, 'stok_menu' => 50, 'id_products' => 3],
            ['nama_menu'=> 'Strawberry Juice', 'harga_menu' => 10000.00, 'stok_menu' => 50, 'id_products' => 3],

        ];

        DB::table('menuses')->insert($data);
    }
}
