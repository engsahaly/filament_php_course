<?php

namespace App\Filament\Admin\Resources\Borrowings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;

class BorrowingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Borrower & Book')
                    ->schema([
                        Select::make('borrower_id')
                            ->label('Borrower')
                            ->relationship('borrower', 'name')
                            ->required()
                            ->searchable(['name', 'email'])
                            ->getOptionLabelFromRecordUsing(function (Model $record) {
                                return $record->name . ' | ' . $record->email;
                            })
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->placeholder('Borrower Name'),
                                TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->placeholder('Borrower Email'),
                            ])
                            ->createOptionModalHeading('Create New Borrower'),
                            
                        Select::make('book_id')
                            ->label('Book')
                            ->relationship('book', 'title', function (Builder $query, string $operation) {
                                if ($operation == 'create') {
                                    return $query->where('status', 'available');
                                }
                            })
                            ->required()
                            ->searchable(['title', 'isbn'])
                            ->getOptionLabelFromRecordUsing(function (Model $record) {
                                return $record->title . ' | ' . $record->isbn;
                            }),
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
