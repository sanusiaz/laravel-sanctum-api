<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name(), 
            'email'     => $this->faker->safeEmail(),
            'address'   => $this->faker->streetAddress(), 
            'city'      => $this->faker->city(), 
            'state'     => $this->faker->streetName(), 
            'country'    => $this->faker->country()
        ];
    }
}
