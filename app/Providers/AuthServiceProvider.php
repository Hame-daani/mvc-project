<?php

namespace App\Providers;

use App\Policies\QuizPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Quiz::class => QuizPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
            return $user->is_admin
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });
        Gate::define('attempt', function (User $user, Quiz $quiz) {
            if ($user->attempts()->where('quiz_id', $quiz->id)->exists())
                return Response::deny('You can not attempt this quiz!');
            return Response::allow();
        });
    }
}
