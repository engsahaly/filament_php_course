<?php

namespace App\Filament\Widgets;

use App\Models\Subscriber;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class MyCustomWidget extends Widget
{
    // protected static ?int $sort = 2;
    protected static bool $isDiscovered = false;

    protected int | string | array $columnSpan = 'full';

    protected string $view = 'filament.widgets.my-custom-widget';
    public string $email = '';

    public function submit()
    {
        $this->validate([
            'email'=> ['required', 'email', 'unique:subscribers,email'],
        ]);

        Subscriber::create(['email' => $this->email]);

        $this->reset('email');

        Notification::make()
            ->title('Subscribed successfully')
            ->success()
            ->send();
    }
}
