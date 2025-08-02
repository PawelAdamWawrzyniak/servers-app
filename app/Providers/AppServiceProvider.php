<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(class: \Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(provider:\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(provider:TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
