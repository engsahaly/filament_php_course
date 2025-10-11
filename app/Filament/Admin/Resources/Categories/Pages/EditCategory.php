<?php

namespace App\Filament\Admin\Resources\Categories\Pages;

use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Support\Icons\Heroicon;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\Categories\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    // protected function mutateFormDataBeforeFill(array $data): array
    // {
    //     $data['name'] = 'custom modificxation for ' . $data['name'];
    //     return $data;
    // }

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     $data['name'] = 'custom modificxation for ' . $data['name'];
    //     return $data;
    // }

    // protected function getSavedNotificationTitle(): ?string
    // {
    //     return 'Category Updated';
    // }
    
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Category updated')
            ->body('Category ' . $this->record->name . ' updated')
            ->icon(Heroicon::AcademicCap);
    }
}
