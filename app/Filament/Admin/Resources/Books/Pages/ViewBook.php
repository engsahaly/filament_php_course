<?php

namespace App\Filament\Admin\Resources\Books\Pages;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Admin\Resources\Books\BookResource;

class ViewBook extends ViewRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
