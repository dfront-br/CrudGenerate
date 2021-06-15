<?php

namespace Digitalfront\CrudGenerator;

use Digitalfront\CrudGenerator\Commands\CrudGenerator;
use Illuminate\Support\ServiceProvider;

/**
 * Class CrudServiceProvider.
 */
class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudGenerator::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/config/crud.php' => config_path('crud.php'),
            __DIR__ . '/resource/digitalfront/' => stubs_path('views/'),
            __DIR__ . '/resource/digitalfront/' => stubs_path('components/'),
        ], 'crud');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
