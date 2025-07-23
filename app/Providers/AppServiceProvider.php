<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{User,category};
use Illuminate\Support\Facades\Gate;

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


/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    Gate::define('update-post', callback: function (User $user, category $category) {
        return $user->id === $category->user_id;
    });
}
}
