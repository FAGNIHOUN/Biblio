<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BookFormRequest;

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
        $data = $request->validated();

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('cover_images', $filename, 'public');

            $data['cover_image'] = $path;

            //dd($request->all());
        }

        if($request->hasFile('content_file')){
            $file = $request->file('content_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('pdfs', $filename, 'public');

            $data['content_file'] = $path;

            //dd($request->all());
        }


        $book = Book::create($data);
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
        $data = $request->validated();

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('cover_images', $filename, 'public');

            $data['cover_image'] = $path;

            //dd($request->all());
            if($book->cover_image){
                Storage::disk('public')->delete($book->cover_image);
            }
        }

        if($request->hasFile('content_file')){
            $file = $request->file('content_file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('pdfs', $filename, 'public');

            $data['content_file'] = $path;

            //dd($request->all());
            if($book->content_file){
                Storage::disk('public')->delete($book->content_file);
            }
        }


        $book->update($data);
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
