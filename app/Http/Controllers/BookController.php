<?php

namespace App\Http\Controllers;

use App\Http\Requests\searchBookrequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(searchBookrequest $request) {

        $query = Book::query()->orderby('created_at', 'desc');

        if($request->validated('title')){
            $query = $query->where('title', 'like', '%'.$request->validated('title').'%' );
        }
        if($request->validated('author')){
            $query = $query->where('author', 'like', '%'.$request->validated('author').'%' );
        }
        if($request->validated('genre')){
            $query = $query->where('genre', 'like', '%'.$request->validated('genre').'%' );
        }



        // $books = Book::paginate(16);
        return view('book.index',['books' => $query->paginate(16),'input' => $request->validated()]);


    }

    public function show(String $slug, Book $book){
        if($slug !== $book->getSlug()){
            return to_route('book.show', ['slug' => $book->getSlug(), 'book' => $book]);
        }

        return view('book.show', ['book' => $book] );
    }
}
