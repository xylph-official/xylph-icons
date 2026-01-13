<?php

namespace Xylph\Icons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Xylph\Icons\Commands\IconsInstall;
use Xylph\Icons\View\Components\Icon;

class XylphIconsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/resources/config/icons.php',
            'icons'
        );
    }

    public function boot()
    {
        // Config publication
        $this->publishes([
            __DIR__ . '/resources/config/icons.php' => config_path('icons.php'),
        ], 'xylph-icons-config');

        // Load views from package
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'xylph-icons');

        // Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                IconsInstall::class,
            ]);
        }

        // Register <x-i> component
        Blade::component('i', Icon::class);
    }
}
