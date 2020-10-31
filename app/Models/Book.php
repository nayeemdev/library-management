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
        return $this->hasOne('App\Models\Publication', 'id', 'publication_id');
    }

    public function copies()
    {
        return $this->hasMany('App\Models\BookCopy', 'book_id', 'id');
    }

    public function genre()
    {
        return $this->belongsToMany('App\Models\Genre');
    }

    public function author()
    {
        return $this->belongsToMany('App\Models\Author');
    }
}
