<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Auth\Pages\Login as BaseLoginPage;

class MyLoginPage extends BaseLoginPage
{
    public function getHeading(): string | Htmlable
    {
        return 'Login to your account';
    }

    public function getSubheading(): string | Htmlable | null
    {
        return new HtmlString('Please sign in to your account.' . ' ' . $this->registerAction->toHtml());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label(__('filament-panels::auth/pages/login.form.email.label'))
                    ->required()
                    ->autocomplete()
                    ->autofocus()
                    ->extraInputAttributes(['tabindex' => 1])
                    ->label('Email or Phone')
                    ->placeholder('Email or Phone'),


                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        $field = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        return [
            $field => $data['email'],
            'password' => $data['password'],
        ];
    }
}
