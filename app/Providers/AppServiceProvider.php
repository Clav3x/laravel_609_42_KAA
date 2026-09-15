<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\SalonSession;

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
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-session', function (User $user, SalonSession $session) {
            return $user->is_admin OR $session->client_id == $user->id;
        });

        Gate::define('update-session', function (User $user, SalonSession $session) {
            return $user->is_admin OR $session->beautician_id == $user->id;
        });
    }
}
