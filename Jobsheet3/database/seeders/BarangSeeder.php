<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $kategori_id = 1;
        $supplier_id = 1;

        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'barang_id' => $i,
                'kategori_id' => $kategori_id,
                'barang_kode' => 'BRG' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'barang_nama' => 'Barang Dummy ' . $i,
                'harga_beli' => 10000 * $i,
                'harga_jual' => 12000 * $i,
            ];

            if ($i % 3 == 0) $kategori_id++;
            if ($i % 5 == 0) $supplier_id++;
        }
        DB::table('m_barang')->insert($data);
    }
}