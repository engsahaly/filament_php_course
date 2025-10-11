<?php

namespace App\Filament\Admin\Resources\Borrowings;

use App\Filament\Admin\Resources\Borrowings\Pages\CreateBorrowing;
use App\Filament\Admin\Resources\Borrowings\Pages\EditBorrowing;
use App\Filament\Admin\Resources\Borrowings\Pages\ListBorrowings;
use App\Filament\Admin\Resources\Borrowings\Pages\ViewBorrowing;
use App\Filament\Admin\Resources\Borrowings\Schemas\BorrowingForm;
use App\Filament\Admin\Resources\Borrowings\Schemas\BorrowingInfolist;
use App\Filament\Admin\Resources\Borrowings\Tables\BorrowingsTable;
use App\Models\Borrowing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BorrowingResource extends Resource
{
    protected static ?string $model = Borrowing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Gift;

    // protected static ?string $recordTitleAttribute = 'name';

    protected static string | UnitEnum | null $navigationGroup = 'Borrowing Management';

    public static function form(Schema $schema): Schema
    {
        return BorrowingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BorrowingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BorrowingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBorrowings::route('/'),
            'create' => CreateBorrowing::route('/create'),
            'view' => ViewBorrowing::route('/{record}'),
            'edit' => EditBorrowing::route('/{record}/edit'),
        ];
    }
}
