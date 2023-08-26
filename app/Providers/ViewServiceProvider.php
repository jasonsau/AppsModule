<?php

namespace App\Providers;

use App\View\Composers\NavbarComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {
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
        error_log("Esta entrando a navbarComposer");
        Facades\View::composer(['AppTwo::index', 'navbar'], NavbarComposer::class);
    }
}
