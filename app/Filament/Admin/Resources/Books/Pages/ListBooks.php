<?php

namespace App\Filament\Admin\Resources\Books\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use App\Filament\Admin\Resources\Books\BookResource;
use App\Filament\Admin\Resources\Books\Widgets\TotalBooksWidget;

class ListBooks extends ListRecords
{
    use ExposesTableToWidgets;
    
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'available' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('available_copies', '>', 0)),
            'unavailable' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('available_copies', '=', 0)),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TotalBooksWidget::class,
        ];
    }
}
