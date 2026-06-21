<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        $products = [

            [
                'kode_barang' => 'BRG001',
                'kode_kategori' => 'KTG001',
                'nama_barang' => 'Indomie Goreng',
                'harga_jual' => 3500,
                'stok' => 50
            ],

            [
                'kode_barang' => 'BRG002',
                'kode_kategori' => 'KTG001',
                'nama_barang' => 'Mie Sedaap Soto',
                'harga_jual' => 3200,
                'stok' => 40
            ],

            [
                'kode_barang' => 'BRG003',
                'kode_kategori' => 'KTG002',
                'nama_barang' => 'Aqua 600ml',
                'harga_jual' => 4000,
                'stok' => 100
            ],

            [
                'kode_barang' => 'BRG004',
                'kode_kategori' => 'KTG002',
                'nama_barang' => 'Le Minerale 600ml',
                'harga_jual' => 3500,
                'stok' => 90
            ],

            [
                'kode_barang' => 'BRG005',
                'kode_kategori' => 'KTG003',
                'nama_barang' => 'Teh Botol Sosro',
                'harga_jual' => 5000,
                'stok' => 60
            ],

            [
                'kode_barang' => 'BRG006',
                'kode_kategori' => 'KTG003',
                'nama_barang' => 'Pocari Sweat',
                'harga_jual' => 9000,
                'stok' => 45
            ],

            [
                'kode_barang' => 'BRG007',
                'kode_kategori' => 'KTG004',
                'nama_barang' => 'Beras Ramos 5 Kg',
                'harga_jual' => 78000,
                'stok' => 20
            ],

            [
                'kode_barang' => 'BRG008',
                'kode_kategori' => 'KTG005',
                'nama_barang' => 'Gula Gulaku 1 Kg',
                'harga_jual' => 18000,
                'stok' => 35
            ],
[
                'kode_barang' => 'BRG009',
                'kode_kategori' => 'KTG006',
                'nama_barang' => 'Minyak Bimoli 1L',
                'harga_jual' => 22000,
                'stok' => 25
            ],

            [
                'kode_barang' => 'BRG010',
                'kode_kategori' => 'KTG007',
                'nama_barang' => 'Rinso Anti Noda',
                'harga_jual' => 15000,
                'stok' => 15
            ]

        ];
        foreach ($products as &$p) {
          $p['harga_beli'] = $p['harga_jual'] * 0.8;
  }
  unset($p);

        DB::table('products')->insert($products);
    }

}
