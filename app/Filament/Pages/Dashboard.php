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
        // This tells Filament to use a 3-column grid on large screens
        return [
            'default' => 1,
            'md' => 2,
            'xl' => 3, 
        ];
    }
    
    // 2. Define the widgets and their placement
    public function getVisibleWidgets(): array
    {
        return [
            LibraryStats::class,
            BorrowOverview::class,
            FineStats::class,
        ];
    }
}         