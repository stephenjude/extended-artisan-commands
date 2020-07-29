<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase as Orchestra;
use Stephenjude\ExtendedArtisanCommands\ExtendedArtisanCommandsServiceProvider;

class TestCase extends Orchestra
{
    public function setUp() : void
    {
        parent::setUp();

        $this->cleanOutputDirectory();
    }

    protected function getPackageProviders($app)
    {
        return [ExtendedArtisanCommandsServiceProvider::class];
    }

    private function cleanOutputDirectory() : void
    {
        /**
         *  Remove known files while suppressing errors
         */
        @unlink(app_path('Contracts/EmailContract.php'));
        @unlink(app_path('Traits/FileUpload.php'));
        @unlink(app_path('Services/CommandGenerator.php'));
        @unlink(app_path('Services/EmailService.php'));
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app) : void
    {
        $app['config']->set('extended-artisan-commands.class_namespace', '');
        $app['config']->set('extended-artisan-commands.abstract_class_namespace', '');
        $app['config']->set('extended-artisan-commands.interface_namespace', '\Contracts');
        $app['config']->set('extended-artisan-commands.trait_namespace', '\Traits');
    }
}
