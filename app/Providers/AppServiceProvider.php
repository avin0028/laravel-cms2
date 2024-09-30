<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Gate::define('admin-writer', function (User $user) {
            return $user->role = 'admin' || $user->role = 'writer';
        });
        Gate::define('admin-editor', function (User $user) {
            return $user->role = 'admin' || $user->role = 'editor';
        });
        Gate::define('admin', function (User $user) {
            return $user->role = 'admin';
        });
    }
}
