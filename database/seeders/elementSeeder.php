<?php

namespace Database\Seeders;

use App\Livewire\Admin\Elementos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\element;

class elementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        element::factory(60)->create();
    }
}
