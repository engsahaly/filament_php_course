<?php

namespace App\Filament\Admin\Resources\Books\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('isbn'),
                DatePicker::make('published_year'),
                TextInput::make('total_copies')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('available_copies')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('author_id')
                    ->numeric(),
            ]);
    }
}
