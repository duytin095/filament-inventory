<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use Filament\Actions;
use App\Models\Product;
use App\Models\Purchase;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PurchaseResource;

class CreatePurchase extends CreateRecord
{
    protected static string $resource = PurchaseResource::class;
    protected function handleRecordCreation(array $data): Purchase
    {
        // Create the purchase record
        $purchase = Purchase::create($data);

        // Update product stock
        $product = Product::find($data['product_id']);
        $product->increment('stock', $data['quantity']);

        return $purchase;
    }  
}
