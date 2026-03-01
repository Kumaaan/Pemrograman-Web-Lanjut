<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $detail_id = 1;

        for ($penjualan_id = 1; $penjualan_id <= 10; $penjualan_id++) {
            for ($j = 1; $j <= 3; $j++) {
                $barang_id = rand(1, 15); 
                $data[] = [
                    'detail_id' => $detail_id,
                    'penjualan_id' => $penjualan_id,
                    'barang_id' => $barang_id,
                    'harga' => 12000 * $barang_id, 
                    'jumlah' => rand(1, 5), 
                ];
                $detail_id++;
            }
        }
        DB::table('t_penjualan_detail')->insert($data);
    }
}