<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
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
        $resourcePaths = [];
        $baseRoute = 'apps';
        $appsView = scandir(base_path($baseRoute));
        foreach($appsView as $app) {
            if ($app != "." && $app != "..") {
                $resourcePaths[] = base_path() . '/apps/' . $app . '/views';
            }
            View::addNamespace($app, base_path() . '/apps/' . $app . '/views');
        }
        Config::get('view.paths');
        Config::set(
            'view.paths',
            array_merge(Config::get('view.paths'), $resourcePaths)
        );
    }
}
