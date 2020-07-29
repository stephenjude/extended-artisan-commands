<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

use Illuminate\Support\Facades\File;

class MakeInterfaceTest extends TestCase
{
    /** @test */
    public function test_make_interface()
    {
        $this->artisan('make:interface EmailContract')
            ->expectsOutput('Interface created successfully.')
            ->assertExitCode(0);
    }
}
