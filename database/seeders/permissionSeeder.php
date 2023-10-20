<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Administrador',
        ]);
        Permission::create([
            'name' => 'Editor',
        ]);
        Permission::create([
            'name' => 'Traductor',
        ]);
        Permission::create([
            'name' => 'Traducir al Ingles',
        ]);
        Permission::create([
            'name' => 'Traducir al Alemán',
        ]);
        Permission::create([
            'name' => 'Traducir al Frances',
        ]);

    }
}
