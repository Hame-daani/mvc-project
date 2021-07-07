<?php

namespace App\Policies;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class QuizPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->is_admin) {
            return true;
        }
    }
    public function update(User $user, Quiz $quiz)
    {
        //
        return $user->id === $quiz->user_id
            ? Response::allow()
            : Response::deny('You do not own this quiz.');
    }

    public function delete(User $user, Quiz $quiz)
    {
        //
        return $user->id === $quiz->user_id
            ? Response::allow()
            : Response::deny('You do not own this quiz.');
    }
}
