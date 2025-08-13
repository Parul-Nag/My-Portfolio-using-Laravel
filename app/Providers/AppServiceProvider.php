<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Skip heavy logic during artisan commands in build
        if (app()->runningInConsole()) {
            return;
        }

        if (env('FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        }
    }
}
