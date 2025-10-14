<?php

namespace App\Filament\Admin\Resources\Categories\Pages;

use App\Models\Category;
use Filament\Actions\CreateAction;
use Filament\Support\Icons\Heroicon;
use Filament\Support\Enums\IconPosition;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\Categories\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Categories')
                ->icon(Heroicon::AcademicCap)
                ->iconPosition(IconPosition::Before)
                ->badge(Category::count())
                ->badgeColor('success')
                ->badgeTooltip('Total number of Categories')
                ->extraAttributes(['class' => 'newClass']),



            'active' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'active')),
            'inactive' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'inactive')),
        ];
    }

    public ?string $activeTab = 'inactive';
}
