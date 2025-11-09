<?php

namespace Xylph\Icons;

use Illuminate\Support\ServiceProvider;
use Xylph\Icons\Commands\IconsInstall;

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

        // Blade component
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'xylph-icons');

        $this->publishes([
            __DIR__ . '/resources/views/components' => resource_path('views/components'),
        ], 'xylph-icons-components');

        // Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                IconsInstall::class,
            ]);
        }

        // Register Blade component
        $this->app->afterResolving('blade.compiler', function ($blade) {
            $blade->component('xylph-icons::components.i', 'i');
        });
    }
}
