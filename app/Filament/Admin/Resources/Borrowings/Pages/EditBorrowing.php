<?php

namespace App\Filament\Admin\Resources\Borrowings\Pages;

use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\Borrowings\BorrowingResource;

class EditBorrowing extends EditRecord
{
    protected static string $resource = BorrowingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);
        $book = $record->book;
        $book->increment('available_copies');
        $book->status = $book->available_copies > 0 ? 'available' : 'unavailable';
        $book->save();
        return $record;
    }
}
