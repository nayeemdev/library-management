<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function publication()
    {
        return $this->hasOne('App\Models\Publication', 'publication_id', 'id');
    }

    public function copies()
    {
        return $this->belongsToMany('App\Models\BookCopy');
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
