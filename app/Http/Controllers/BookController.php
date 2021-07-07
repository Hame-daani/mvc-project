<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $books = Book::without('quizzes')->get();
        return view('books.index')->with(['books' => $books]);
    }

    public function create()
    {
        $this->authorize('admin');
        return view('Books.create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $this->validate($request, [
            'title' => 'required',
            'info' => 'required',
            'link' => 'required',
            'img' => 'required',
        ]);
        $book = Book::create([
            'title' => $request->title,
            'info' => $request->info,
            'link' => $request->link,
            'img' => $request->img,
        ]);
        return $this->show($book);
    }

    public function show(Book $book)
    {
        $book->load('quizzes');
        //TODO: only 10 quiz??
        return view('books.show')->with(['book' => $book]);
    }

    public function edit(Book $book)
    {
        $this->authorize('admin');
        return view('books.edit')->with(['book' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('admin');
        $input = collect(request()->all())->filter()->all();
        $book->update($input);
        return back();
    }

    public function destroy(Book $book)
    {
        $this->authorize('admin');
        $book->delete();
        return $this->index();
    }
}
