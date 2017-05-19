<?php
namespace Foobooks;

use Foobooks\Book;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany(Book::class);
    }
}
