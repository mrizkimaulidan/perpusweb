<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function book_type()
    {
        return $this->belongsTo(BookType::class, 'book_type_id', 'id');
    }
}
