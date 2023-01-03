<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name(),
            'slug'          => $this->faker->slug(),
            'description'   => $this->faker->paragraph(2),
            'price'         => $this->faker->numberBetween(0,700),
            'image_path'    => $this->faker->imageUrl(),
            'user_id'       => User::factory()
        ];
    }
}
