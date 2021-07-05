<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Book;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index(Book $book)
    {
        // return $book->quizzes;

        return view('quizzes.index')->with(['quizzes' => $book->quizzes]);
    }

    public function create()
    {
        // return view
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'book_id' => 'required',
            'user_id' => 'required',
        ]);
        $book = Quiz::create([
            'title' => $request->title,
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
        ]);
        //
    }


    public function show(Book $book, Quiz $quiz)
    {
        $quiz->load('questions.options');
        // return $quiz;
        return view('quizzes.show')->with(['quiz' => $quiz]);
    }

    public function edit(Quiz $quiz)
    {
        // return form with quiz
    }

    public function update(Request $request, Quiz $quiz)
    {
        $this->validate($request, [
            'title' => 'required',
            'book_id' => 'required',
            'user_id' => 'required',
        ]);
        $quiz->update([
            'title' => $request->title,
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
        ]);
        //return show with quiz
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        //return index
    }
}
