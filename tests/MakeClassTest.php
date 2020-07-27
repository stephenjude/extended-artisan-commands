<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

use Stephenjude\ExtendedArtisanCommands\ExtendedArtisanCommandsServiceProvider;

class MakeClassTest extends TestCase
{

    /** @test */
    public function test_make_class()
    {
        $this->artisan('make:class Helper')
            ->expectsOutput('Trait created successfully.')
            ->assertExitCode(0);
    }

    public function test_make_class_with_namespace()
    {
        $this->artisan('make:class Supports/EmailSupport')
        ->expectsOutput('Class created successfully.')
            ->assertExitCode(0);
    }
}
