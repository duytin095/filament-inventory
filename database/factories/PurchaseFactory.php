<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $supplier = Supplier::inRandomOrder()->first();

        $quantity = fake()->numberBetween(5, 20);

        return [
            'product_id' => $product?->id ?? Product::factory(),
            'supplier_id' => $supplier?->id ?? Supplier::factory(),
            'quantity' => $quantity,
            'purchased_at' => fake()->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
