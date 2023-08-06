<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'image'=>'image/1690023373_Screenshot (119).png',
            'description'=>fake()->text(),
            'price'=>fake()->numberBetween(1,100),
            'category_id'=>fake()->numberBetween(1,10),
            'brand_id'=>fake()->numberBetween(1,10),
   
            
        ];
    }
}
