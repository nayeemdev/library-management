<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    use HasFactory;

    protected $table = 'book_user';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function book_copy()
    {
        return $this->belongsTo('App\Models\BookCopy');
    }

    public function loan_request()
    {
        return $this->belongsTo('App\Models\LoanRequest');
    }

    public function return_request()
    {
        return $this->belongsTo('App\Models\ReturnRequest');
    }
}
