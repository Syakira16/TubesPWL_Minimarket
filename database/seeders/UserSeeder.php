<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::create([
            'kode_pegawai' => 'PGW001',
            'name' => 'Owner',
            'email' => 'owner@minimarket.com',
            'password' => Hash::make('password'),
        ]);

        $owner->assignRole('Owner');
    }
}
