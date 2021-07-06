<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Book;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index(Book $book)
    {
        return view('quizzes.index')->with(['quizzes' => $book->quizzes]);
    }

    public function create(Book $book)
    {
        return view('Quizzes.create')->with(['book' => $book]);
    }

    public function store(Book $book, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $quiz = $book->quizzes()->create([
            'title' => $request->title,
            'user_id' => 1, //TODO: auth for user id
        ]);
        return $this->edit($quiz);
    }


    public function show(Quiz $quiz)
    {
        $quiz->load('questions.options');
        return view('quizzes.show')->with(['quiz' => $quiz]);
    }

    public function edit(Quiz $quiz)
    {
        return view('Quizzes.edit')->with(['quiz' => $quiz]);
    }

    public function update(Request $request, Quiz $quiz)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $quiz->update([
            'title' => $request->title,
        ]);
        return back();
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return back();
    }

    public function attempt(Quiz $quiz, Request $request)
    {
        // save answers
        $answers = $request->except('_token');
        foreach ($answers as $q => $o) {
            Answer::create([
                'user_id' => 1, //TODO: auth user id
                'question_id' => $q,
                'option_id' => $o,
            ]);
        }
        //TODO: count score
        //TODO: save attempt
        return $request->except('_token');
    }
}
