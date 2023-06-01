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
                \Stephenjude\ExtendedArtisanCommands\Commands\ClassMakeCommand::class,
                \Stephenjude\ExtendedArtisanCommands\Commands\AbstractClassMakeCommand::class,
                \Stephenjude\ExtendedArtisanCommands\Commands\InterfaceMakeCommand::class,
                \Stephenjude\ExtendedArtisanCommands\Commands\TraitMakeCommand::class
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
