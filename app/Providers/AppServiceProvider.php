<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapfour();
        // Password::defaults(function () {
        //     $rule= Password::min(8)
        //         ->letters()
        //         ->mixedCase()
        //         ->numbers()
        //         ->symbols();

        //     return $this->app->isProduction()
        //         ? $rule->mixedCase()->uncompromised()
        //         : $rule;
        // });
    }
}
