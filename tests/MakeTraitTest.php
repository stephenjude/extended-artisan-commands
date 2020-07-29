<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

class MakeTraitTest extends TestCase
{
    /** @test */
    public function test_make_trait()
    {
        $this->artisan('make:trait FileUpload')
            ->expectsOutput('Trait created successfully.')
            ->assertExitCode(0);
    }


}
