<?php

namespace App\Filament\Admin\Resources\Authors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->placeholder('Author Name')
                    ->columnSpanFull(),

                RichEditor::make('bio')
                    ->placeholder('Author Bio')
                    ->extraAttributes(['style' => 'height: 300px;'])
                    ->columnSpanFull(),

                // Textarea::make('bio')
                //     ->placeholder('Author Bio')
                //     ->rows(10)
                //     ->columnSpanFull(),
            ]);
    }
}
