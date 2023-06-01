<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

class MakeEnumTest extends TestCase
{
    /** @test */
    public function test_make_trait()
    {
        $this->artisan('make:enum Permission')
            ->expectsOutput($this->enumConsoleOutput)
            ->assertExitCode(0);
    }
}
