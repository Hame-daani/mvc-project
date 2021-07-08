<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // authorize admin
        $users = User::all();
        return view('Users.index')->with(['users' => $users]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
    public function toggle(User $user)
    {
        //$this->authorize('admin');
        $user->is_active = !$user->is_active;
        $user->save();
        return back();
    }
    public function admin(User $user)
    {
        //$this->authorize('admin');
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back();
    }
}
