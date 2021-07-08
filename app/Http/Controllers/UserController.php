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
        // authorize
        $users = User::all();
        return view('Users.index')->with(['users' => $users]);
    }

    public function show(User $user)
    {
        //authorize
        //TODO my attemps maybe?
        $user->load('quizzes');
        //$user->load('attempts');
        return view('Users.show')->with(['user' => $user]);
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function toggle(User $user)
    {
        //authorize
        $user->is_active = !$user->is_active;
        $user->save();
        return back();
    }
    public function admin(User $user)
    {
        //authorize
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back();
    }
}
