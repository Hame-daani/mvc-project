<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function store(Question $question, Request $request)
    {
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
        $option->delete();
        return back();
    }
}
