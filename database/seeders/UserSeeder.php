<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Membuat Admin
        User::create([
            'name' => 'Admin Resto',
            'email' => 'admin@resto.com',
            'alamat' => 'Kantor Pusat',
            'password' => Hash::make('password'), 
            'role' => 'admin',
        ]);

        // Membuat Kasir
        User::create([
            'name' => 'Kasir 1',
            'email' => 'kasir@resto.com',
            'alamat' => 'Meja Kasir',
            'password' => Hash::make('password'),
            'role' => 'kasir',
        ]);

        // Membuat Staff Kitchen
        User::create([
            'name' => 'Staff Kitchen 1',
            'email' => 'kitchen@resto.com',
            'alamat' => 'Area Dapur',
            'password' => Hash::make('password'),
            'role' => 'staff_kitchen',
        ]);

        // // disable check foreign key
        // Schema::disableForeignKeyConstraints();
        
        // // truncate user
        // User::truncate();

        // // enable check foreign key
        // Schema::enableForeignKeyConstraints();


        // // Membuat User Biasa
        // User::create([
        //     'name' => 'Pelanggan Biasa',
        //     'email' => 'user@resto.com',
        //     'alamat' => 'Jl. Pelanggan No. 1',
        //     'password' => Hash::make('password'),
        //     'role' => 'user',
        // ]);
    }
}