<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $categories = [
            'Makanan',
            'Minuman',
            'Snack',
            'Sembako',
            'Produk Susu',
            'Makanan Instan',
            'Peralatan Mandi',
            'Perawatan Tubuh',
            'Peralatan Rumah Tangga',
            'Alat Tulis',
            'Produk Bayi',
            'Obat Ringan',
            'Bumbu Dapur',
            'Makanan Beku',
            'Elektronik Kecil'
        ];

        foreach ($categories as $index => $category) {

            DB::table('categories')->insert([
                'kode_kategori' => 'KTG' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama_kategori' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
