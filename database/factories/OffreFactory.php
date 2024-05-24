<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offre>
 */
class OffreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Proprietaire'=>fake()->name,
            'Location'=>fake()->city(),
            'Descreption'=>fake()->text(),
            'Category'=>"hous",
            'tel'=>"06000000",
            'Price'=>fake()->numberBetween(1000, 300000),
            'Type_Offre'=>fake()->randomElement(['Purchase','Rental'])
        ];
    }
}
