<?php

namespace App\Filament\Admin\Resources\Books\Schemas;

use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;
use Filament\Infolists\Components\TextEntry;

class BookInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('title'),
                TextEntry::make('isbn')
                    ->placeholder('-'),
                TextEntry::make('published_year')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('total_copies')
                    ->numeric(),
                TextEntry::make('available_copies')
                    ->numeric(),
                TextEntry::make('author.name')
                    ->label('Author Name')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
