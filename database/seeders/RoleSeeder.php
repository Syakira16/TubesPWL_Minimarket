<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Owner']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Supervisor']);
        Role::create(['name' => 'Cashier']);
        Role::create(['name' => 'Warehouse Staff']);
    }
}
