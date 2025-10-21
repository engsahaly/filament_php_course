<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Icon;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')  
                    // ->label('Category name')
                    // ->hiddenLabel(function () {
                    //     return 1 == 2;
                    // })
                    // hiddenLabel(false)
                    // ->inlineLabel()
                    // ->default('this is category name')
                    // ->placeholder('this is category name')
                    // ->prefix('https://')
                    // ->suffix('.com')
                    // ->autofocus(false)
                    // ->disabled()
                    // ->disabledOn('edit')
                    // ->hidden()
                    // ->hiddenOn('edit')
                    // ->visible()
                    // ->visibleOn()
                    // ->belowErrorMessage([
                    //     Icon::make(Heroicon::AcademicCap),
                    //     'My custom message'
                    // ])
                    // ->markAsRequired(false)
                    // ->required()
                    // ->startsWith(['a'])
                    // ->disabled(function (Get $get) {
                    //     return $get('status') === 'published';
                    // })
                    // ->label(function (?Model $record) {
                    //     return $record?->name . ' Name';
                    // })
                    // ->belowContent(function ($state) {
                    //     return $state == 'mahmoud' ? 'This is not allowed name' : '';
                    // })
                    // ->live()
                    // ->disabledOn('edit')
                    ->disabled(function (string $operation) {
                        return $operation == 'create';
                    })
                    ,
                
                Select::make('status')  
                    ->options([
                        'draft' => 'Draft',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ])
                    ->live()
                    ->required(),
            ]);
    }
}
