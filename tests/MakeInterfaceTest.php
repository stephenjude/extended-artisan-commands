<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

class MakeInterfaceTest extends TestCase
{
    /** @test */
    public function test_make_interface()
    {
        $this->artisan('make:interface EmailContract')
            ->expectsOutput($this->interfaceConsoleOutput)
            ->assertExitCode(0);
    }
}
