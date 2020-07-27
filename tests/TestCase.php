<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Support\Facades\File;
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
        if (File::isDirectory('app')) {
            File::deleteDirectories('app');
        }
    }
}
