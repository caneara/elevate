<?php declare(strict_types = 1);

namespace Elevate;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{

    /**
     * Bootstrap any application services.
     *
     **/
    public function boot() : void
    {
        $this->publishes([__DIR__ . '/../config/elevate.php' => config_path('elevate.php')]);

        $this->mergeConfigFrom(__DIR__ . '/../config/elevate.php', 'elevate');

        foreach (config('elevate') as $class => $macros) {
            foreach ($macros as $macro => $use) {
                $use ? ("Elevate\\Macros\\$class\\$macro")::register() : null;
            }
        }
    }
}
