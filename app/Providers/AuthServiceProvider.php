<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        # the method define(), accept 2 arguments; the first one is a name "update-question",
        # the second one is a closers that contains 2 arg...
        #(1st is a user instance, and this instance represence the current user sign ir;
        # and the 2nd is the model instance that will authorize)
        \Gate::define('update-question', function($user, $question) {
            # this returns a bolean value, true if both are catch or  false if they not match
            return $user->id === $question->user_id;
        });

        \Gate::define('delete-question', function($user, $question) {
            return $user->id === $question->user_id;
        });

        # se puede usar el mismo Gate tanto para update como para delete pero asumamos que este usuario
        # sera dif en el futuro. asi que lo dejamos como esta.
    }
}
