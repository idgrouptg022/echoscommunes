<?php

namespace App\Providers;

use App\Models\Reporter;
use App\Models\Actualite;
use App\Policies\ActualitePolicy;
use Illuminate\Auth\Access\Response;
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
        Gate::policy(Actualite::class, ActualitePolicy::class);
    }
}
