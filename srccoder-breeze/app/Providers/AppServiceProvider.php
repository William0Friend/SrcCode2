<?php

namespace App\Providers;
use Laravel\Telescope\TelescopeServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //telescope code
        if ($this->app->environment('local')) {
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //loads on boot
        Paginator::useBootstrapFive();
    }
}
