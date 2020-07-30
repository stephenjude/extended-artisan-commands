<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

class MakeAbstractClassTest extends TestCase
{
    public function test_make_abstarct_class()
    {
        $this->artisan('make:abstract-class Services/CommandGenerator')
            ->expectsOutput($this->abstractClassConsoleOutput)
            ->assertExitCode(0);
    }
}
