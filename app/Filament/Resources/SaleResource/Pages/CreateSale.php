<?php

namespace App\Filament\Resources\SaleResource\Pages;

use App\Models\Sale;
use Filament\Actions;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Filament\Resources\SaleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSale extends CreateRecord
{
    protected static string $resource = SaleResource::class;
     protected function handleRecordCreation(array $data): Sale
    {
        return DB::transaction(function () use ($data) {
            // Check if product has enough stock
            $product = Product::find($data['product_id']);
            if ($product->stock < $data['quantity']) {
                $this->notify('danger', 'Not enough stock for this sale.');
                abort(400, 'Insufficient stock.');
            }

            // Create sale and deduct stocks
            $sale = Sale::create($data);
            $product->decrement('stock', $data['quantity']);

            return $sale;
        });
    }
}
