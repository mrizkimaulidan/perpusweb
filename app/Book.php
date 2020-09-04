<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function book_type()
    {
        return $this->belongsTo(BookType::class, 'book_type_id', 'id');
    }
}
