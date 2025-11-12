<?php

namespace App\Filament\Admin\Resources\Borrowings\Pages;

use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\Borrowings\BorrowingResource;

class CreateBorrowing extends CreateRecord
{
    protected static string $resource = BorrowingResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $borrowing = static::getModel()::create($data);
        $book = $borrowing->book;
        $book->decrement('available_copies');
        $book->status = $book->available_copies > 0 ? 'available' : 'unavailable';
        $book->save();
        return $borrowing;
    }

}
