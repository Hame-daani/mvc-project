<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        // $books = Book::without('quizzes')->get();
        $books = Book::all();
        // return $books;
        return view('books.index')->with(['books' => $books]);
    }

    public function create()
    {
        // return view
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
        ]);
        $book = Book::create([
            'title' => $request->title,
            'info' => $request->info,
            'link' => $request->link,
            'img' => $request->img,
        ]);
        return $book;
        // return show with book
    }

    public function show(Book $book)
    {
        $book->load('quizzes');
        // return $book;
        return view('books.show')->with(['book' => $book]);
    }

    public function edit(Book $book)
    {
        // return form with book
    }

    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'info' => $request->info,
            'link' => $request->link,
            'img' => $request->img,
        ]);
        return $book;
        //return show of book
    }

    public function destroy(Book $book)
    {
        $book->delete();
        // return index
    }
}
