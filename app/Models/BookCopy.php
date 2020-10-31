<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCopy extends Model
{
    use HasFactory, SoftDeletes;

    const CONDITION_NEW = 'new';
    const CONDITION_OLD = 'old';

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function librarian()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
}
