<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!Storage::exists('storage/originales')) {
            Storage::makeDirectory('/public/originales', 777, true);
        }

        $this->call(permissionSeeder::class);
        $this->call(roleSeeder::class);
        $this->call(userSeeder::class);
        $this->call(categoriaSeeder::class);
        /* $this->call(elementSeeder::class); */
       /*  $this->call(fotoSeeder::class); */
    }
}
