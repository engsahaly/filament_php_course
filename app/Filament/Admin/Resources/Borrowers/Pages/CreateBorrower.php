<?php

namespace App\Filament\Admin\Resources\Borrowers\Pages;

use App\Filament\Admin\Resources\Borrowers\BorrowerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBorrower extends CreateRecord
{
    protected static string $resource = BorrowerResource::class;
}
