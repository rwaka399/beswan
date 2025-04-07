<?php

namespace App\Providers;

use App\Models\RolePermission;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        Blade::if('canAccess', function ($slug) {
            $user = Auth::user();
            if(!$user) return false;

            return RolePermission::isHasPermission($user->role_id, $slug);
        });

        Paginator::useBootstrap();
    }
}
