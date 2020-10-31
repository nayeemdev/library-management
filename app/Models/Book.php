<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function publication()
    {
        return $this->hasOne(Publication::class, 'id', 'publication_id');
    }

    public function copies()
    {
        return $this->hasMany(BookCopy::class, 'book_id', 'id');
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class)->using(BookGenre::class);
    }

    public function author()
    {
        return $this->belongsToMany(Author::class)->using(AuthorBook::class);
    }
}
