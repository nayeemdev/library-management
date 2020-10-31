<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookUser extends Pivot
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'book_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book_copy()
    {
        return $this->belongsTo(BookCopy::class);
    }

    public function loan_request()
    {
        return $this->belongsTo(LoanRequest::class);
    }

    public function return_request()
    {
        return $this->belongsTo(ReturnRequest::class);
    }
}
