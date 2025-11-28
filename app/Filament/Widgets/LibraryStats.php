<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use App\Models\Fine;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class LibraryStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Books', Book::count())
                ->description('Books available in the library')
                ->descriptionIcon('heroicon-o-book-open')
                ->color('success'),

            Card::make('Active Borrows', BookUser::whereNull('returned_at')->count())
                ->description('Books currently borrowed')
                ->descriptionIcon('heroicon-o-arrow-down-tray')
                ->color('warning'),

            Card::make('Overdue Books', BookUser::whereNull('returned_at')->where('due_date', '<', now())->count())
                ->description('Books past their due date')
                ->descriptionIcon('heroicon-o-clock')
                ->color('danger'),

            Card::make('Total Users', User::count())
                ->description('Registered members')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),

            Card::make('Total Fines', Fine::sum('amount') . ' PKR')
                ->description('Total fine amount issued')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('info')
        ];
    }
}
