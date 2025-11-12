<?php

namespace App\Filament\Admin\Resources\Books;

use UnitEnum;
use BackedEnum;
use App\Models\Book;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Admin\Resources\Books\Pages\EditBook;
use App\Filament\Admin\Resources\Books\Pages\ViewBook;
use App\Filament\Admin\Resources\Books\Pages\ListBooks;
use App\Filament\Admin\Resources\Books\Pages\CreateBook;
use App\Filament\Admin\Resources\Books\Schemas\BookForm;
use App\Filament\Admin\Resources\Books\Tables\BooksTable;
use App\Filament\Admin\Resources\Books\Schemas\BookInfolist;
use App\Filament\Admin\Resources\Books\RelationManagers\BorrowingsRelationManager;
use App\Filament\Admin\Resources\Books\RelationManagers\CategoriesRelationManager;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string | UnitEnum | null $navigationGroup = 'Library Management';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return BookForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BookInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BooksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            BorrowingsRelationManager::class,
            CategoriesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBooks::route('/'),
            'create' => CreateBook::route('/create'),
            'view' => ViewBook::route('/{record}'),
            'edit' => EditBook::route('/{record}/edit'),
        ];
    }
}
