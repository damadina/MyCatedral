<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categoria::create([
        'title' => 'Home',
        'orden' => '0',
        'isPublic' => false,
        ]);
        categoria::create([
            'title' => 'Exterior',
            'orden' => '0',
            'isPublic' => false,
        ]);
        categoria::create([
            'title' => 'Interior',
            'orden' => '0',
            'isPublic' => false,
        ]);
        categoria::create([
            'title' => 'Capillas',
            'orden' => '0',
            'isPublic' => false,
        ]);
        categoria::create([
            'title' => 'Museo',
            'orden' => '0',
            'isPublic' => false,
        ]);

    }
}
