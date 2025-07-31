<?php

namespace Database\Seeders;

use App\Models\Sale;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();
        Product::factory()->count(30)->create();
        Supplier::factory()->count(10)->create();

        // Create 50 purchases and update product stock
        Purchase::factory()->count(50)->create()->each(function ($purchase) {
            $purchase->product->increment('stock', $purchase->quantity);
        });

        // After purchases:
        Sale::factory()->count(30)->create()->each(function ($sale) {
            $sale->product->decrement('stock', $sale->quantity);
        });
    }
}
