<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;
use Foobooks\Book;
use Foobooks\Chapter;
use Foobooks\Http\Requests\createChapterRequest;
use Auth;
use DB;

use Foobooks\Http\Requests;

class ChapterController extends Controller
{
    /*
    Get all chapters related to book 
    */
    public function index($bookid){
    	$chapters = Chapter::whereBookid($bookid);
        return $chapters;
    }

    public function create(Book $books){
        $author = $books->user;  
        if(!\Auth::check() || $author['id'] != Auth::user()->id) {
            return ('You do not have sufficient permissions to add chapters to this book.');
        }
        return view('books.add')->with(compact('books'));
    }

public function store(createChapterRequest $request, Book $books) {
        Chapter::create(
                ['name' => $request->input('name'), 
                'content' => $request->input('content'),
                'order' => $request->input('order'),
                'book_id' => $books->id,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
                ]
        );
        $chapters = Chapter::where('book_id', '=', $books->id)->get();
        return view('books.show')->with(compact('books', 'chapters'));
    }

    public function show(Book $books, Chapter $chapters){
    	if ($books->id == $chapters->book_id) return view('books.chapter')->with(compact('chapters'));
    	return "Error in retrieving chapter chosen";
    }

    public function edit(Book $books, Chapter $chapters){
        $author = $chapters->book->user;

        if ($author['id'] == Auth::user()->id || $chapters->book == $books) return view('books.edit_chapter')->with(compact('chapters','books'));
        return "No rights to edit this chapter";
    }

    public function update(Book $books, Chapter $chapters, Request $request){
        $chapters->name = $request->input('name');
        $chapters->content = $request->input('content');
        $chapters->updated_at = new \DateTime();
        $chapters->order = $request->input('order');
        $chapters->save();

        $chapters = Chapter::where('book_id', '=', $books->id)->get();
        return view('books.show')->with(compact('books', 'chapters'));;
    }

    public function destroy(Book $books, Chapter $chapters, Request $request){
        $author = $chapters->book->user;
        if ($author['id'] == Auth::user()->id || $chapters->book == $books){
            $chapters->delete();
            $chapters=Chapter::whereBookId($books->id)->get();
            return redirect()->back();
        }
        return "You do not have sufficient permissions to delete this chapter.";
    }
}