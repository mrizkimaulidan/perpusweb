<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    protected $fillable = ['name', 'description'];

    public function book()
    {
        return $this->hasMany(Book::class, 'id');
    }

    public function book_user()
    {
        return $this->hasMany(BookUser::class, 'id');
    }
}
