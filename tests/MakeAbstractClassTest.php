<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

class MakeAbstractClassTest extends TestCase
{
    public function test_make_abstarct_class()
    {
        $this->artisan('make:abstract-class Services/CommandGenerator')
            ->expectsOutput('Abstract Class created successfully.')
            ->assertExitCode(0);
    }
}
