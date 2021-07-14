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
            return Response::allow();
        }
    }

    public function view(User $user, Quiz $quiz)
    {
        if ($user->id === $quiz->user_id)
            return Response::allow();
        return $quiz->is_active
            ? Response::allow()
            : Response::deny('this quiz is not activated');
    }

    public function update(User $user, Quiz $quiz)
    {
        return $user->id === $quiz->user_id
            ? Response::allow()
            : Response::deny('You do not own this quiz.');
    }

    public function delete(User $user, Quiz $quiz)
    {
        return $user->id === $quiz->user_id
            ? Response::allow()
            : Response::deny('You do not own this quiz.');
    }

    public function attempt(User $user, Quiz $quiz)
    {
        if ($user->attempts()->where('quiz_id', $quiz->id)->exists())
            return Response::deny('You can not attempt this quiz!');
        return Response::allow();
    }
}
