<?php

namespace Foobooks;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function book() {
        # Chapter belongs to Book
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('Foobooks\Book');
    }
}
