<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $status = $this->faker->randomElement(['B', 'P', 'V']);
        return [
            'status'        => $status,
            'quantity'      => $this->faker->numberBetween(1,20),
            'amount'        => $this->faker->numberBetween(100,1000),
            'billed_date'   => $this->faker->dateTimeThisDecade(),
            'payed_date'    => $this->faker->dateTimeThisDecade(),
            'customer_id' => Customer::factory()
        ];
    }
}
