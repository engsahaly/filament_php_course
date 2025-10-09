<?php

namespace App\Filament\Admin\Resources\Borrowers;

use App\Filament\Admin\Resources\Borrowers\Pages\CreateBorrower;
use App\Filament\Admin\Resources\Borrowers\Pages\EditBorrower;
use App\Filament\Admin\Resources\Borrowers\Pages\ListBorrowers;
use App\Filament\Admin\Resources\Borrowers\Pages\ViewBorrower;
use App\Filament\Admin\Resources\Borrowers\Schemas\BorrowerForm;
use App\Filament\Admin\Resources\Borrowers\Schemas\BorrowerInfolist;
use App\Filament\Admin\Resources\Borrowers\Tables\BorrowersTable;
use App\Models\Borrower;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BorrowerResource extends Resource
{
    protected static ?string $model = Borrower::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserPlus;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | UnitEnum | null $navigationGroup = 'Borrowing Management';

    public static function form(Schema $schema): Schema
    {
        return BorrowerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BorrowerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BorrowersTable::configure($table);
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
            'index' => ListBorrowers::route('/'),
            'create' => CreateBorrower::route('/create'),
            'view' => ViewBorrower::route('/{record}'),
            'edit' => EditBorrower::route('/{record}/edit'),
        ];
    }
}
