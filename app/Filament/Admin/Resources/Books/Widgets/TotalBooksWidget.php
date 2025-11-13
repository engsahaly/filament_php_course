<?php

namespace App\Filament\Admin\Resources\Books\Widgets;

use App\Filament\Admin\Resources\Books\Pages\ListBooks;
use App\Models\Book;
use Filament\Support\Icons\Heroicon;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageTable;

class TotalBooksWidget extends StatsOverviewWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListBooks::class;
    }
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', $this->getPageTableRecords()->count())
                ->description('Total numbers of books')
                ->descriptionIcon(Heroicon::ArrowLongUp, IconPosition::Before)
                ->descriptionColor('success')
                ,
        ];
    }
}
