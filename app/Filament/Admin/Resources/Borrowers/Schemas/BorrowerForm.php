<?php

namespace App\Filament\Admin\Resources\Borrowers\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class BorrowerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Grid::make()
                    ->schema([
                        TextInput::make('name')
                            ->placeholder('Borrower Name')
                            ->required(),
        
                        TextInput::make('email')
                            ->placeholder('Email Address')
                            ->label('Email address')
                            ->required()
                            ->unique()
                            ->email(),
        
                        TextInput::make('phone')
                            ->placeholder('Phone Number')
                            ->tel(),
                    ])
                    ->columns(3)
                    ->columnSpanFull()
                    ,

                Textarea::make('address')
                    ->placeholder('Address')
                    ->columnSpanFull(),
            ]);
    }
}
