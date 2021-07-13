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
        return redirect()->route('quizzes.edit', ['quiz' => $quiz]);
    }

    public function show(Quiz $quiz)
    {
        $this->authorize('view', $quiz);
        $quiz->load('questions.options');
        $attempt = $quiz->attempts()->where('user_id', Auth::id())->first();
        if ($attempt) {
            $answers = $quiz->answers()->where('user_id', Auth::id())->pluck('option_id')->toArray();
        }
        return view('Quizzes.show')->with(['quiz' => $quiz, 'answers' => $attempt ? $answers : null]);
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
            'is_active' => 0,
        ]);
        return back();
    }

    public function destroy(Request $request, Quiz $quiz)
    {
        $this->authorize('delete', $quiz);
        $book = $quiz->book;
        $quiz->delete();
        if ($request->header('referer') == route('quizzes.index'))
            return back();
        else
            return redirect()->route('books.show', $book->id);
    }

    public function attempt(Quiz $quiz, Request $request)
    {
        $this->authorize('attempt', $quiz);
        if (!$quiz->is_active)
            return back();
        $input = $request->input('answers');
        $user = Auth::user();
        $score = 0;
        foreach ($input as $q => $o) {
            $answer = Answer::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'option_id' => $o,
            ]);
            if ($answer->option->is_right)
                $score += 10;
        }
        $quiz->attempts()->attach($user->id, ['score' => $score]);
        return back();
    }

    public function toggle(Quiz $quiz)
    {
        $this->authorize('admin');
        $quiz->is_active = !$quiz->is_active;
        $quiz->save();
        return back();
    }
}
