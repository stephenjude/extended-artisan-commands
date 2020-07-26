<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

use Orchestra\Testbench\TestCase;
use Stephenjude\ExtendedArtisanCommands\ExtendedArtisanCommandsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ExtendedArtisanCommandsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
