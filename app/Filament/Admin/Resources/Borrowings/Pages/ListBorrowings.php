<?php

namespace App\Filament\Admin\Resources\Borrowings\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\Borrowings\BorrowingResource;

class ListBorrowings extends ListRecords
{
    protected static string $resource = BorrowingResource::class;

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
            'borrowed' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'borrowed')),
            'returned' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'returned')),
        ];
    }
}
