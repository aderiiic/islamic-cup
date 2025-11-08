<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('moderate', fn (User $user) => $user->isAdmin() || $user->isModerator());
        Gate::define('team', fn (User $user) => $user->isTeamOwner() || $user->isModerator() || $user->isAdmin());

        // Finkornigare gate för ManageUsers-komponenten
        Gate::define('manage-users', fn (User $user) => $user->isAdmin() || $user->isModerator());
        Gate::define('assign-roles', fn (User $user) => $user->isAdmin() || $user->isModerator());
    }
}
