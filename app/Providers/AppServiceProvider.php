<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (!$this->app->isLocal()) {
            return;
        }

        $this->app->register(TelescopeServiceProvider::class);
    }

    public function boot(): void
    {
        // Bootstrap any application services.
    }
}
