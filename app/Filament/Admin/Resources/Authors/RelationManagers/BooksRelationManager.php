<?php

namespace App\Filament\Admin\Resources\Authors\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BooksRelationManager extends RelationManager
{
    protected static string $relationship = 'books';

    protected static ?string $title = "Author's books";


    public function isReadOnly():bool
    {
        return false;
    }

    public function form(Schema $schema): Schema
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
                Select::make('status')
                    ->options(['available' => 'Available', 'unavailable' => 'Unavailable'])
                    ->default('available')
                    ->required(),
            ]);
    }

    public function infolist(Schema $schema): Schema
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
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('isbn'),
                TextColumn::make('published_year')
                    ->date()
                    ->sortable(),
                TextColumn::make('total_copies')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('available_copies')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
                // DissociateAction::make(),
                // DeleteAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DissociateBulkAction::make(),
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
