<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

class MakeClassTest extends TestCase
{
    /** @test */
    public function test_make_class()
    {
        $this->artisan('make:class Services/EmailService')
            ->expectsOutput('Class created successfully.')
            ->assertExitCode(0);
    }
}
