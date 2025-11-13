<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use app\Models\Borrowing;

class LatestBorrowings extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Borrowing::query()->latest()->limit(10))
            ->columns([
                TextColumn::make('borrower.name'),
                TextColumn::make('book.title'),
                TextColumn::make('borrowed_at')
                    ->dateTime(),
                TextColumn::make('status')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
               //
            ])
            ->paginated(false)
            ;
    }
}
