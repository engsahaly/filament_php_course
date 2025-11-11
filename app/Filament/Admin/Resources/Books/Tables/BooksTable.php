<?php

namespace App\Filament\Admin\Resources\Books\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\Width;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Field;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Enums\PaginationMode;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;

class BooksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                
                TextColumn::make('title')
                    ->label('Book Title')
                    ->searchable()
                    ,
                TextColumn::make('isbn')
                    ->searchable(),
                TextColumn::make('published_year')
                    ->date()
                    ->sortable(),
                TextColumn::make('total_copies')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('available_copies')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('author.name')
                    ->label('Book Author')
                    ->sortable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                

                Filter::make('status')
                    ->query(fn (Builder $query): Builder => $query->where('status', 'available')),
                    // ->toggle()
                    // ->label('Available Status')

                SelectFilter::make('Book Status')
                    ->options([
                        'available' => 'available',
                        'unavailable' => 'unavailable',
                    ])
                    ->attribute('status')
                    ->multiple()
                    ->searchable()
                    ->placeholder('Select Book Status')
                    ->label('Book Status Label'),

                TernaryFilter::make('availability')
                    ->label('Status Availability')
                    ->placeholder('Status Availability Placeholder')
                    ->trueLabel('Available Books')
                    ->falseLabel('Unavailable Books')
                    ->queries(
                        true: fn (Builder $query) => $query->where( 'status', 'available'),
                        false: fn (Builder $query) => $query->where('status', 'unavailable'),
                        blank: fn (Builder $query) => $query, // In this example, we do not want to filter the query when it is blank.
                    )
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No books yet')
            ->emptyStateDescription('No books yet description')
            ->emptyStateIcon(Heroicon::BookOpen)
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create post')
                    ->url('https://www.google.com')
                    ->icon(Heroicon::AcademicCap)
                    ->button(),
            ])
            ;
    }
}
