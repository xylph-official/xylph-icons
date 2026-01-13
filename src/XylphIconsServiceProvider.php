<?php

namespace Xylph\Icons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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

        // Load views from package (for <x-xylph-icons::components.i>)
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'xylph-icons');

        // Register <x-i> only if not already defined in project
        // Project's resources/views/components/i.blade.php takes priority
        if (!file_exists(resource_path('views/components/i.blade.php'))) {
            Blade::anonymousComponentPath(
                __DIR__ . '/resources/views/components'
            );
        }
    }
}
