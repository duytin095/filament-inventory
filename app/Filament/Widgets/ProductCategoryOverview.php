<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ProductCategoryOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Categories', Category::query()->count()),
            Stat::make('Total Products', Product::query()->count()),
            Stat::make('Total Sales', \App\Models\Sale::count()),

        ];
    }
}
