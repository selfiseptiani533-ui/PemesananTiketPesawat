<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasPenerbanganSeeder extends Seeder
{
    public function run(): void
    {
        $penerbangans = DB::table('penerbangans')->pluck('id');

        foreach ($penerbangans as $id) {
            $kelas = [
                [
                    'penerbangan_id' => $id,
                    'nama_kelas' => 'Ekonomi',
                    'harga' => 500000,
                    'jumlah_kursi' => 100,
                    'sisa_kursi' => 100,
                    'deskripsi' => 'Kelas ekonomi nyaman dan hemat.',
                    'fasilitas' => 'TV, Snack, Wi-Fi',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'penerbangan_id' => $id,
                    'nama_kelas' => 'Bisnis',
                    'harga' => 1500000,
                    'jumlah_kursi' => 50,
                    'sisa_kursi' => 50,
                    'deskripsi' => 'Kelas bisnis lebih lega dan premium.',
                    'fasilitas' => 'TV, Makanan lengkap, Wi-Fi, Reclining seat',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'penerbangan_id' => $id,
                    'nama_kelas' => 'First Class',
                    'harga' => 3000000,
                    'jumlah_kursi' => 20,
                    'sisa_kursi' => 20,
                    'deskripsi' => 'Kelas utama mewah dengan pelayanan maksimal.',
                    'fasilitas' => 'TV, Makanan lengkap, Wi-Fi, Reclining seat, Private cabin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];

            DB::table('kelas_penerbangans')->insert($kelas);
        }
    }
}
