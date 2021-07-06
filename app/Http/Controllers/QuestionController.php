<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function store(Quiz $quiz, Request $request)
    {
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
        $question->delete();
        return back();
    }
}
