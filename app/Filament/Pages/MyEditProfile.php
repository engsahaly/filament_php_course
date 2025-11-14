<?php

namespace App\Filament\Pages;

use Filament\Panel;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;

class MyEditProfile extends BaseEditProfile
{
    public static function getSlug(?Panel $panel = null): string
    {
        return 'my-profile';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),

                // phone number
                TextInput::make('phone')
                    ->label('Phone Number')
                    ->placeholder('Phone Number')
                    ->tel(),

                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getCurrentPasswordFormComponent(),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label(__('filament-panels::auth/pages/edit-profile.form.actions.save.label'))
            ->submit('save')
            ->keyBindings(['mod+s'])
            ->color('info');
    }
}
