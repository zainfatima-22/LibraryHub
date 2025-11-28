<?php

namespace App\Filament\Widgets;

use App\Models\Fine;
use Filament\Widgets\PieChartWidget;

class FineStats extends PieChartWidget
{
    protected static ?string $heading = 'Fine Status Distribution';
    protected static ?string $description = 'Proportion of paid vs. unpaid fines.';
    // Set a neutral widget color
    

    protected function getData(): array
    {
        $paid = Fine::where('status', 'paid')->count();
        $unpaid = Fine::where('status', 'unpaid')->count();

        return [
            'datasets' => [
                [
                    'data' => [$paid, $unpaid],
                    // Assign explicit, contrasting colors
                    'backgroundColor' => [
                        'rgb(34, 197, 94)', 
                        'rgba(51, 52, 167, 1)', 
                    ],
                    'hoverBackgroundColor' => [
                        'rgb(50, 200, 100)', 
                        'rgba(51, 52, 167, 1)', 
                    ],
                ],
            ],
            'labels' => ['Paid Fines', 'Unpaid Fines'],
        ];
    }
}