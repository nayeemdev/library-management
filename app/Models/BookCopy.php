<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id', 'id');
    }

    public function librarian()
    {
        return $this->belongsTo('App\Models\User', 'added_by', 'id');
    }
}
