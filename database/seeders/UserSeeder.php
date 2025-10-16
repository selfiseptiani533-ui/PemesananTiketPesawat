<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        // Admin
        User::create([
            'name' => 'admin', 
            'nama_lengkap' => 'Administrator LionAir',
            'email' => 'admin@lionair.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No.1, Jakarta',
            'tanggal_lahir' => '1990-01-01',
        ]);

        // User biasa
        User::create([
            'name' => 'rasya', 
            'nama_lengkap' => 'Rasya Febrian',
            'email' => 'user@lionair.test',
            'password' => Hash::make('password'),
            'role' => 'user',
            'no_hp' => '081298765432',
            'alamat' => 'Jl. Anggrek No.5, Depok',
            'tanggal_lahir' => '2008-10-10',
        ]);
    }
}
