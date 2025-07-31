<?php

namespace App\Filament\Widgets;

use App\Models\Purchase;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class PurcharsesChart extends ChartWidget
{
    protected static ?string $heading = 'Purcharses';

    

    protected function getData(): array
    {
        $data = Trend::model(Purchase::class)
            ->between(
                start: now()->subMonth(),
                end: now(),
            )
            ->perDay()
            ->dateColumn('purchased_at') // 👈 This tells Trend to use your custom date
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Purchases',
                    'data' => $data->map(fn($value) => $value->aggregate),
                    'borderColor' => '#10B981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
