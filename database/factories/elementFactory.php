<?php

namespace Database\Factories;

use App\Models\categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class elementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $name = $this->faker->sentence($nbWords = 3, $variableNbWords = true);
        return [
            'orden' => 0,
            'title' => $name,
            'slug' => Str::slug($name),
            'seoTitle' => $this->faker->sentence(),
            'seoMeta' => $this->faker->sentence(),
            'isPublic' => true,
            'categoria_id' =>  categoria::all()->random()->id
        ];
    }
}
