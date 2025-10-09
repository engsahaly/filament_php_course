<?php

namespace App\Models;

use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $guarded = [];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
