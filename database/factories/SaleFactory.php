<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      // Get only products with stock > 0
    $product = Product::where('stock', '>', 0)->inRandomOrder()->first();

    if (! $product) {
        return []; // fallback: no sale if no stock available
    }

    // Sell between 1 and the available stock
    $maxQty = $product->stock;
    $quantity = fake()->numberBetween(1, $maxQty);

    return [
        'product_id' => $product->id,
        'quantity' => $quantity,
        'sold_at' => fake()->dateTimeBetween('-1 month', 'now'),
    ];
    }
}
