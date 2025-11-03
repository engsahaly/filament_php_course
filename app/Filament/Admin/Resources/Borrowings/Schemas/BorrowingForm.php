<?php

namespace App\Filament\Admin\Resources\Borrowings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DateTimePicker;

class BorrowingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Borrower & Book')
                    ->schema([
                        TextInput::make('borrower_id')
                            ->numeric(),
                        TextInput::make('book_id')
                            ->numeric(),
                    ]),

                Section::make('Borrowing Details')
                    ->schema([
                        DateTimePicker::make('borrowed_at')
                            ->placeholder('Borrowed Date')
                            ->native(false),
                        
                        Select::make('status')
                            ->options(['borrowed' => 'Borrowed', 'returned' => 'Returned'])
                            ->default('borrowed')
                            ->searchable(),
                    ]),
            ]);;
    }
}
