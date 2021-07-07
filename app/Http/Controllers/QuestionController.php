<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function store(Quiz $quiz, Request $request)
    {
        $this->authorize('update', $quiz);
        $this->validate($request, [
            'text' => 'required',
        ]);
        $question = $quiz->questions()->create([
            'text' => $request->text,
        ]);
        return back();
    }

    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question->quiz);
        $this->validate($request, [
            'text' => 'required',
        ]);
        $question->update([
            'text' => $request->text,
        ]);
        return back();
    }


    public function destroy(Question $question)
    {
        $this->authorize('update', $question->quiz);
        $question->delete();
        return back();
    }
}
