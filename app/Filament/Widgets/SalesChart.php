<?php

namespace App\Filament\Widgets;

use App\Models\Sale;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Sales';

    

    protected function getData(): array
    {
        $data = Trend::model(Sale::class)
            ->between(
                start: now()->subMonth(),
                end: now(),
            )
            ->perDay()
            ->dateColumn('sold_at') // 👈 This tells Trend to use your custom date
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Sales',
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
