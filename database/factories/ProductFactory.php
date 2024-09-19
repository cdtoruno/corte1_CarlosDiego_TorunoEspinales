<?php

namespace Database\Factories;
use App\Models\Product;

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
            'codigo' => $this->faker->unique()->numberBetween(0, 10000000),
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(3),
            'categoria' => $this->faker->randomElement(['calzado', 'ropa', 'joyería']),
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
            
        ];
    }
}
