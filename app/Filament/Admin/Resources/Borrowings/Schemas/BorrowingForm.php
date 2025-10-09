<?php

namespace App\Filament\Admin\Resources\Borrowings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BorrowingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('borrower_id')
                    ->numeric(),
                TextInput::make('book_id')
                    ->numeric(),
                DateTimePicker::make('borrowed_at'),
                Select::make('status')
                    ->options(['borrowed' => 'Borrowed', 'returned' => 'Returned'])
                    ->default('borrowed'),
            ]);
    }
}
