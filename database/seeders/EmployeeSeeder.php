<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
        [
            'kode_pegawai' => 'PGW001',
            'kode_cabang' => 'CBG001',
            'nama_pegawai' => 'Budi Santoso',
            'jenis_kelamin' => 'L',
            'no_telp' => '081234567890',
            'alamat' => 'Bandung',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
