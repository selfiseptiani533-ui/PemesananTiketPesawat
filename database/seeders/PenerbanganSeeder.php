<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenerbanganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('penerbangans')->insert([
            [
                'kode_penerbangan' => 'AF101',
                'maskapai' => 'AirForceOne',
                'asal' => 'Jakarta',
                'tujuan' => 'Bali',
                'waktu_berangkat' => now()->addDays(1),
                'waktu_tiba' => now()->addDays(1)->addHours(2),
                'durasi_menit' => 120,
                'harga' => 500000,
                'kursi_tersedia' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_penerbangan' => 'AF102',
                'maskapai' => 'AirForceOne',
                'asal' => 'Jakarta',
                'tujuan' => 'Surabaya',
                'waktu_berangkat' => now()->addDays(2),
                'waktu_tiba' => now()->addDays(2)->addHours(2),
                'durasi_menit' => 120,
                'harga' => 600000,
                'kursi_tersedia' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_penerbangan' => 'AF103',
                'maskapai' => 'AirForceOne',
                'asal' => 'Jakarta',
                'tujuan' => 'Medan',
                'waktu_berangkat' => now()->addDays(3),
                'waktu_tiba' => now()->addDays(3)->addHours(3),
                'durasi_menit' => 180,
                'harga' => 700000,
                'kursi_tersedia' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
