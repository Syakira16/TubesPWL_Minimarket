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
            'password' => Hash::make('owner123'),
        ]);

        $owner->assignRole('Owner');


        $manager = User::create([
            'kode_pegawai' => 'PGW002',
            'name' => 'Manager',
            'email' => 'manager@minimarket.com',
            'password' => Hash::make('manager123'),
        ]);

        $manager->assignRole('Manager');


        $supervisor = User::create([
            'kode_pegawai' => 'PGW003',
            'name' => 'Supervisor',
            'email' => 'supervisor@minimarket.com',
            'password' => Hash::make('supervisor123'),
        ]);

        $supervisor->assignRole('Supervisor');


        $cashier = User::create([
            'kode_pegawai' => 'PGW004',
            'name' => 'Cashier',
            'email' => 'cashier@minimarket.com',
            'password' => Hash::make('cashier123'),
        ]);

        $cashier->assignRole('Cashier');


        $warehouse = User::create([
            'kode_pegawai' => 'PGW005',
            'name' => 'Warehouse',
            'email' => 'warehouse@minimarket.com',
            'password' => Hash::make('wareshouse123'),
        ]);

        $warehouse->assignRole('Warehouse Staff');
    }
}
