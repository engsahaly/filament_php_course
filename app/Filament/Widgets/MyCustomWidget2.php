<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class MyCustomWidget2 extends Widget
{
    protected static bool $isDiscovered = false;
    // protected static ?int $sort = 1;

    protected string $view = 'filament.widgets.my-custom-widget2';
}
