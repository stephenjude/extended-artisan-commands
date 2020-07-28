<?php

namespace Stephenjude\ExtendedArtisanCommands;

use Illuminate\Support\ServiceProvider;

class ExtendedArtisanCommandsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('extended-artisan-commands.php'),
            ], 'config');

            // Registering package commands.
            $this->commands([
                'Stephenjude\ExtendedArtisanCommands\Commands\ClassMakeCommand',
                'Stephenjude\ExtendedArtisanCommands\Commands\AbstractClassMakeCommand',
                'Stephenjude\ExtendedArtisanCommands\Commands\InterfaceMakeCommand',
                'Stephenjude\ExtendedArtisanCommands\Commands\TraitMakeCommand'
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'extended-artisan-commands');
    }
}
