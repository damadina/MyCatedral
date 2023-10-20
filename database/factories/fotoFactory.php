<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\foto>
 */
class fotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->image('public/storage/originales',1350,900,null,false),
            'title' => $this->faker->sentence(),
            'piedefoto' => $this->faker->sentence(),
            'alt' => $this->faker->sentence(),
            'keywords' => $this->faker->paragraph(),
        ];
    }
}
