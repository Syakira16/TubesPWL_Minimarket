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
        $faker = Faker::create('id_ID');
        $kategori = DB::table('categories')->pluck('kode_kategori');
        
        for ($i = 1; $i <= 50; $i++) {
            DB::table('products')->insert([
                'kode_barang' => 'BRG' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'kode_kategori' => $faker->randomElement($kategori),
                'nama_barang' => ucfirst($faker->words(2, true)),
                'harga_beli' => $faker->numberBetween(5000, 50000),
                'harga_jual' => $faker->numberBetween(6000, 80000),
                'stok' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
