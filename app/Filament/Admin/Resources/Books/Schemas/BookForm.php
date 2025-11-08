<?php

namespace App\Filament\Admin\Resources\Books\Schemas;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Size;
use Filament\Actions\ActionGroup;
use Filament\Support\Enums\Width;
use Illuminate\Support\Facades\Log;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Support\Enums\Alignment;
use Filament\Schemas\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\IconPosition;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Wizard\Step;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


                Action::make('Say Hello')
                    ->action(function () {
                        Log::info('Say hello');
                        Notification::make()
                            ->title('logged successfully')
                            // ->duration(3000)
                            // ->seconds(2)
                            ->persistent()
                            ->color('success')
                            ->icon(Heroicon::AcademicCap)
                            ->iconColor('success')
                            ->body('Your message has been logged successfully')
                            ->actions([
                                Action::make('Go to Google')
                                    ->button()
                                    ->color('primary')
                                    ->url('https://google.com'),
                            ])
                            ->send();
                    }),








            





                TextInput::make('title')
                    ->placeholder('Book Title')
                    ->required()
                    ,

                TextInput::make('isbn')
                    ->required()
                    ->unique()
                    ->placeholder('ISBN')
                    ,

                DatePicker::make('published_year')
                    ->label('Published Date')
                    ->placeholder('Published Date')
                    ->native(false)
                ,

                TextInput::make('author_id')
                    ->numeric(),

                TextInput::make('total_copies')
                    ->placeholder('Total Copies')
                    ->required()
                    ->numeric()
                    ->rules(['min:1']),

                TextInput::make('available_copies')
                    ->placeholder('Available Copies')
                    ->required()
                    ->numeric()
                    ->rules(['min:0']),

            
                
            ]);
    }
}
