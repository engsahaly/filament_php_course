<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingFactory> */
    use HasFactory;

    protected $guarded = [];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
