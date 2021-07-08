<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Book;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $this->authorize('admin');
        $quizzes = Quiz::all();
        return view('Quizzes.index')->with(['quizzes' => $quizzes]);
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
            'user_id' => Auth::id(),
        ]);
        return $this->edit($quiz);
    }


    public function show(Quiz $quiz)
    {
        $this->authorize('view', $quiz);
        $quiz->load('questions.options');
        return view('quizzes.show')->with(['quiz' => $quiz]);
    }

    public function edit(Quiz $quiz)
    {
        $this->authorize('update', $quiz);
        return view('Quizzes.edit')->with(['quiz' => $quiz]);
    }

    public function update(Request $request, Quiz $quiz)
    {
        $this->authorize('update', $quiz);
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
        $this->authorize('delete', $quiz);
        $quiz->delete();
        return back(); //TODO: dont go back!
    }

    public function attempt(Quiz $quiz, Request $request)
    {
        // save answers
        $answers = $request->except('_token');
        foreach ($answers as $q => $o) {
            Answer::create([
                'user_id' => Auth::id(),
                'question_id' => $q,
                'option_id' => $o,
            ]);
        }
        //TODO: count score
        //TODO: save attempt
        return $request->except('_token');
    }
    public function toggle(Quiz $quiz)
    {
        $this->authorize('admin');
        $quiz->is_active = !$quiz->is_active;
        $quiz->save();
        return back();
    }
}
