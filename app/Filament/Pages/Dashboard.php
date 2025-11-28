<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\LibraryStats;
use App\Filament\Widgets\BorrowOverview;
use App\Filament\Widgets\FineStats;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    // 1. Define a responsive column grid
    public function getColumns(): int | string | array
    {
        return [
            'default' => 1,
            'md' => 2, // Two columns on medium screens
            'xl' => 3, // Three columns on extra-large screens
        ];
    }
    
    // 2. Define the widgets and their placement
    public function getWidgets(): array
    {
        return [
            // Stats should always span the full width for prominence
            LibraryStats::class, // Assuming this is your Stats Overview Widget

            // Line chart takes a larger horizontal space (e.g., 2/3)
            BorrowOverview::class,

            // Pie chart fits nicely in the remaining space (e.g., 1/3)
            FineStats::class,
        ];
    }
}