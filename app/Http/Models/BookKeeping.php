<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookKeeping extends Model
{
    protected $table = 'book_keeping';

    protected $fillable = [
        'transaction_type', 'transaction_date', 'amount', 'description', 'img', 'day', 'month', 'year'
    ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];
}
