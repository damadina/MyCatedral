<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Carlos Martí Mallén',
            'email' => 'carlos.marti.mallen@gmail.com',
            'password' => bcrypt('Damadina5487')
        ]);

        $user->assignRole('Admin');


    }
}
