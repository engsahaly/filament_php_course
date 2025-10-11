<?php

namespace App\Filament\Admin\Resources\Categories\Pages;

use App\Models\Category;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\Categories\CategoryResource;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['name'], '-');

        return $data;
    }

    // protected function handleRecordCreation(array $data): Model
    // {
    //     $category = Category::create($data);
    //     Log::info('category created ' . $category->name);
    //     return $category;
    // }

    // protected function getRedirectUrl(): string
    // {
        // return CategoryResource::getUrl('index');
        // return $this->getResource()::getUrl('index');
        // return $this->previousUrl ?? $this->getResource()::getUrl('index');
    // }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Category created';
    }
    
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Category created')
            ->body('Category ' . $this->record->name . ' created')
            ->icon(Heroicon::AcademicCap);
    }

    // protected static bool $canCreateAnother = false;
    // public function canCreateAnother(): bool
    // {
    //     return true;
    // }

    // protected function preserveFormDataWhenCreatingAnother(array $data): array
    // {
    //     return ['name' => $data['name']];
    // }

    protected function beforeFill(): void
    {
        Log::info('before fill hook');
    }

    protected function afterFill(): void
    {
        $this->data['name'] = "Mahmoud anwar";
        Log::info($this->data);
        Log::info('after fill hook');
    }

    protected function beforeValidate(): void
    {
        Log::info('before validate hook');
    }

    protected function afterValidate(): void
    {
        Log::info('after validate hook');
    }

    protected function beforeCreate(): void
    {
        Log::info('before create hook');
    }

    protected function afterCreate(): void
    {
        Log::info($this->record);
        Log::info('after create hook');
    }

}
