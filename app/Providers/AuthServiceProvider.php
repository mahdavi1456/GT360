<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('SuperAccount', function($user) {
            return $user->account->account_acl == 'super-account';
        });
        Gate::define('AdminAccount', function($user) {
            return $user->account->account_acl == 'admin-account';
        });
        Gate::define('agent', function($user) {
            return $user->account->account_acl == 'agent';
        });
        Gate::define('cos', function($user) {
            return $user->account->account_acl == 'cos';
        });
    }
}
