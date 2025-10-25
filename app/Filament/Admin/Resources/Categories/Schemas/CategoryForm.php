<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Icon;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Utilities\Get;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                FusedGroup::make([
                    TextInput::make('name')
                        ->placeholder('Category Name'),
                    Select::make('status')  
                        ->options([
                            'draft' => 'Draft',
                            'reviewing' => 'Reviewing',
                            'published' => 'Published',
                        ]),
                ])
                ->label('Category Details')
                ->columnSpanFull()
                ->columns(2),
                
            ]);
    }
}
