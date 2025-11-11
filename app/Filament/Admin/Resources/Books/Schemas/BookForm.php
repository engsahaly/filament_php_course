<?php

namespace App\Filament\Admin\Resources\Books\Schemas;

use App\Models\Author;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Size;
use Filament\Actions\ActionGroup;
use Filament\Support\Enums\Width;
use Illuminate\Support\Facades\Log;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Wizard;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\IconPosition;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Wizard\Step;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

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



                Select::make('author_id')
                    ->label('Author')
                    ->relationship('author', 'name', function (Builder $query) {
                        return $query->whereNotNull('bio');
                    })
                    ->required()
                    ->helperText('Select an author from the list')
                    ->searchable(['name', 'bio'])
                    ->getOptionLabelFromRecordUsing(function (Model $record) {
                        return $record->name . ' | ' . substr($record->bio, 0, 5);
                    })
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->placeholder('Author Name'),
                        Textarea::make('bio')
                            ->placeholder('Author Bio'),
                    ])
                    ->createOptionModalHeading('Create New Author')
                    ->createOptionUsing(function (array $data) {
                        $data['name'] = 'custom ' . $data['name'];
                        return Author::create($data)->getKey();
                    })
                    ->editOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->placeholder('Author Name'),
                    ])


                    ,




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
