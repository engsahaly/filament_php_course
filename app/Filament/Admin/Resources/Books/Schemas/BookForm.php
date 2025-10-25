<?php

namespace App\Filament\Admin\Resources\Books\Schemas;

use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\IconPosition;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Wizard\Step;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Wizard::make([
                    Step::make('Book Info')
                        ->schema([
                            TextInput::make('title')
                                ->required(),
                            TextInput::make('isbn'),
                        ])
                        ->description('Book Information Details')
                        ->icon(Heroicon::BookOpen)
                        ->completedIcon(Heroicon::CheckCircle),

                    Step::make('Publishing Info')
                        ->schema([
                            DatePicker::make('published_year'),
                            TextInput::make('author_id')
                                ->numeric(),
                        ]),

                    Step::make('Stock')
                        ->schema([
                            TextInput::make('total_copies')
                                ->required()
                                ->numeric()
                                ->default(0),
                            TextInput::make('available_copies')
                                ->required()
                                ->numeric()
                                ->default(0),
                        ]),
                    ])
                    ->skippable()
                    ->startOnStep(2)
                    ->columnSpanFull()
                    ->columns(2),


                
            ]);
    }
}
