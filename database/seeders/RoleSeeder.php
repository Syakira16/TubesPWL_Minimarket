<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'Owner']);
        Role::firstOrCreate(['name' => 'Manajer']);
        Role::firstOrCreate(['name' => 'Supervisor']);
        Role::firstOrCreate(['name' => 'Kasir']);
        Role::firstOrCreate(['name' => 'Gudang']);
    }
}
