<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/auth0/callback', 'Auth0Controller@callback');

Route::get('/practice', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';

});


/*
* Navigation Bar
*/
Route::get('about', 'BookController@getAbout');
Route::get('/', 'BookController@index');

Route::resource('tag', 'TagController');
Route::resource('books.chapters', 'ChapterController');
Route::resource('books', 'BookController');


/*
* Login routes
*/

# Process logout/login for mobile only

Route::get('/logout', 'Auth\AuthController@logout');    

Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');
