<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'kategori'=> "Makanan Utama"
            ],
            [
                'kategori'=> "Appetizer"
            ],
            [
                'kategori' => 'Minuman'
            ]
        ]);
    }
}
