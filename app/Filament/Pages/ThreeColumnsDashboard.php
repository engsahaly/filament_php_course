<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Widgets\AccountWidget;
use App\Filament\Widgets\MyCustomWidget;
use Filament\Widgets\FilamentInfoWidget;
use App\Filament\Widgets\MyCustomWidget2;
use Filament\Pages\Dashboard as BaseDashboard;

class ThreeColumnsDashboard extends BaseDashboard
{
    protected static string $routePath = '/three-columns-dashboard';

    public function getColumns(): int | array
    {
        return 3;
    }

    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            FilamentInfoWidget::class,
            MyCustomWidget2::class,
            MyCustomWidget::class
        ];
    }


    // protected string $view = 'filament.pages.three-columns-dashboard';
}
