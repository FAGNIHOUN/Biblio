<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookFormRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.book.index', [
            'books' => Book::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        return view('admin.book.form', [
            'book' => $book,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookFormRequest $request)
    {
        $book = Book::create($request->validated());
        return to_route('admin.book.index')->with('success', 'Le livre à été enregistré avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.book.form', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookFormRequest $request, Book $book)
    {
        $book->update($request->validated());
        return to_route('admin.book.index')->with('success', 'Les informations du livre ont été modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return to_route('admin.book.index')->with('success', 'Les informations du livre ont été supprimé avec succès');
    }
}
