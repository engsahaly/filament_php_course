<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrower;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Total stats';

    protected ?string $description = 'Total Stats Description';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::count())
                ->description('Total numbers of books')
                ->descriptionIcon(Heroicon::ArrowLongUp, IconPosition::Before)
                ->descriptionColor('success')
                ,
            Stat::make('Total authors', Author::count())
                ->description('Total numbers of authors')
                ->descriptionIcon(Heroicon::ArrowLongUp, IconPosition::Before)
                ->descriptionColor('success')
                ,
            Stat::make('Total Borrowers', Borrower::count())
                ->description('Total numbers of Borrowers')
                ->descriptionIcon(Heroicon::ArrowLongUp, IconPosition::Before)
                ->descriptionColor('success')
                ,
        ];
    }
}
