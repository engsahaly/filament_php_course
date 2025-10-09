<?php

namespace App\Filament\Admin\Resources\Borrowings\Pages;

use App\Filament\Admin\Resources\Borrowings\BorrowingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBorrowing extends ViewRecord
{
    protected static string $resource = BorrowingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
