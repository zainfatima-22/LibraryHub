<?php

namespace App\Filament\Widgets;

use App\Models\BookUser;
use Filament\Widgets\LineChartWidget;
use Carbon\Carbon;

class BorrowOverview extends LineChartWidget
{
    protected static ?string $heading = 'Monthly Borrow Activity';
    // Change subtitle for context
    protected static ?string $description = 'Books borrowed over the last 30 days, aggregated by day.';
    // Set a custom primary color for the chart
    protected int | string | array $columnSpan = [
        'xl' => 2,
    ];

    protected function getData(): array
    {
        // ... (data aggregation logic remains the same)
        $days = collect(range(1, 30))->map(function ($day) {
            $date = Carbon::now()->subDays(30 - $day)->toDateString();

            return [
                'date' => $date,
                'count' => BookUser::whereDate('borrowed_at', $date)->count(),
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Books Borrowed',
                    'data' => $days->pluck('count'),
                    // Optional: Custom color for dataset (overrides widget color)
                    'borderColor' => 'rgb(34, 197, 94)', // Tailwind 'green-500'
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)', // Light fill
                    'tension' => 0.4, // Adds a smooth curve
                ],
            ],
            'labels' => $days->pluck('date')->map(fn ($date) => Carbon::parse($date)->format('M j')),
        ];
    }
    
    // Add professional chart options
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'display' => false, 
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false, 
                ],
            ],
            'elements' => [
                'point' => [
                    'radius' => 0, 
                ],
            ],
        ];
    }
}