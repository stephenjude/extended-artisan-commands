<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase as Orchestra;
use Stephenjude\ExtendedArtisanCommands\ExtendedArtisanCommandsServiceProvider;

class TestCase extends Orchestra
{
    /**
     * Console output for make:interface command
     *
     * @var string
     */
    protected $interfaceConsoleOutput = 'Interface created successfully.';

    /**
     * Console output for make:trait command
     *
     * @var string
     */
    protected $traitConsoleOutput = 'Trait created successfully.';

    /**
     * Console output for make:trait command
     *
     * @var string
     */
    protected $enumConsoleOutput = 'Enum created successfully.';

    /**
     * Console output for make:class command
     *
     * @var string
     */
    protected $classConsoleOutput = 'Class created successfully.';

    /**
     * Console output for make:abstract-class command
     *
     * @var string
     */
    protected $abstractClassConsoleOutput = 'Abstract Class created successfully.';

    public function setUp(): void
    {
        parent::setUp();

        $this->cleanOutputDirectory();
    }

    protected function getPackageProviders($app)
    {
        return [ExtendedArtisanCommandsServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('extended-artisan-commands.class_namespace', '');
        $app['config']->set('extended-artisan-commands.abstract_class_namespace', '');
        $app['config']->set('extended-artisan-commands.interface_namespace', '\Contracts');
        $app['config']->set('extended-artisan-commands.trait_namespace', '\Traits');
    }

    private function cleanOutputDirectory(): void
    {
        File::deleteDirectory(base_path('app'));
    }
}
