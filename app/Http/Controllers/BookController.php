<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

use Foobooks\Book;

use Foobooks\Chapter;

use Foobooks\Http\Requests\CreateBookRequest;

use Illuminate\Auth\AuthManager;

use Auth;

use DB;

class BookController extends Controller
{
    /**
    * Responds to requests to GET /index
    */
    public function index() {
    	$user = Auth::user();
		$mybooks = null;
    	if($user) {
	    	$userid = $user->id;
	    	$mybooks = Book::where('user_id', '=', $userid)->get();	
    	}
    	$books = Book::with('user')->orderBy('updated_at', 'desc')->get();
        return view('books.index')->with(compact('mybooks', 'books'));
    }

    public function getAbout() {
    	return view('books.about');
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function create() {
        if(!\Auth::check()) {
        	\Session::flash('message', 'You have to be logged in to create a new book');
        	return redirect('/login');
        }
        return view('books.create');
    }

	/**
	 * Responds to requests to POST /books/create
	 */
	public function store(CreateBookRequest $request) {
	    Book::create(
	    		['title' => $request->input('title'), 
	    		'cover' => $request->input('cover'),
	    		'synopsis' => $request->input('synopsis'),
	    		'created_at' => new \DateTime(),
	    		'updated_at' => new \DateTime(),
	    		'user_id' => Auth::user()->id
	    		]
	    );
	    return redirect('/');
	}

    /**
     * Responds to requests to GET /books/show/{id}
     */
	public function show(Book $books){
    	$chapters = Chapter::where('book_id', '=', $books->id)->orderBy('order')->get();
    	return view('books.show')->with(compact('books', 'chapters'));
    }

    public function edit(Book $books){
        $author = $books->user;
        if (Auth::check()){
        	if ($author['id'] == Auth::user()->id) return view('books.edit')->with(compact('books'));	
        }
        return "You do not have sufficient permissions to edit this book.";
    }

    public function update(Book $books, CreateBookRequest $request){
        $books->title = $request->input('title');
        $books->cover = $request->input('cover');
        $books->synopsis = $request->input('synopsis');
        $books->updated_at = new \DateTime();
        $books->save();
        $chapters = Chapter::where('book_id', '=', $books->id)->orderBy('order')->get();
    	return view('books.show')->with(compact('books', 'chapters'));
    }

    /**
    * GET
    * Page to confirm deletion
    */
    public function confirmDeletion(Book $books) {
        $author = $books->user;  
        if ($author['id'] == Auth::user()->id){
            return view('books.delete')->with('books', $books);
        }
        return "You do not have sufficient permissions to delete this chapter.";
    }

    public function destroy(Book $books){
        $author = $books->user;  
        if ($author['id'] == Auth::user()->id){
            $books->delete();
            return redirect("/");
        }
    }
}	