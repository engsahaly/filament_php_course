<?php

namespace App\Filament\Admin\Resources\Borrowings\Pages;

use App\Filament\Admin\Resources\Borrowings\BorrowingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBorrowing extends CreateRecord
{
    protected static string $resource = BorrowingResource::class;
}
