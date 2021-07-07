<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function store(Question $question, Request $request)
    {
        $this->authorize('update', $question->quiz);
        $this->validate($request, [
            'text' => 'required',
        ]);
        $question = $question->options()->create([
            'text' => $request->text,
            'is_right' => $request->is_right ? 1 : 0,
        ]);
        return back();
    }

    public function destroy(Option $option)
    {
        $this->authorize('update', $option->question->quiz);
        $option->delete();
        return back();
    }
}
