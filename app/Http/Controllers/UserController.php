<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $this->authorize('admin');
        $users = User::all();
        return view('Users.index')->with(['users' => $users]);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        //TODO my attemps maybe?
        $user->load('quizzes');
        //$user->load('attempts');
        return view('Users.show')->with(['user' => $user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit')->with(['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $input = collect(request()->all())->filter()->all();
        $user->update($input);
        return back();
    }

    public function toggle(User $user)
    {
        $this->authorize('update', $user);
        $user->is_active = !$user->is_active;
        $user->save();
        return back();
    }

    public function admin(User $user)
    {
        $this->authorize('update', $user);
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back();
    }

    public function topusers()
    {
        $users = User::all()->sortByDesc('scores')->values()->take(10);
        return view('users.tops')->with(['users' => $users]);
    }
}
