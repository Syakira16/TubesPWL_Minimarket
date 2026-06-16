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
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 15; $i++) {

            DB::table('categories')->insert([
                'kode_kategori' => 'KTG' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_kategori' => ucfirst($faker->unique()->word()),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
