<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'email'=>fake()->email(),
            'phone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'total'=>fake()->numberBetween(1000,10000),
            'payment'=>fake()->numberBetween(0,1),
            'status'=>fake()->numberBetween(0,1),
            'date'=>fake()->date(),
            'user_id'=>fake()->numberBetween(1,10),
        ];
    }
}
