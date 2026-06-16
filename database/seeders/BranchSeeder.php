<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
        [
            'kode_cabang' => 'CBG001',
            'nama_cabang' => 'Minimarket Bandung',
            'alamat' => 'Jl. Asia Afrika',
            'kota' => 'Bandung',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'kode_cabang' => 'CBG002',
            'nama_cabang' => 'Minimarket Jakarta',
            'alamat' => 'Jl. Sudirman',
            'kota' => 'Jakarta',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}
