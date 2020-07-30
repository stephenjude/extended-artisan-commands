<?php

namespace Stephenjude\ExtendedArtisanCommands\Tests;

class MakeClassTest extends TestCase
{
    /** @test */
    public function test_make_class()
    {
        $this->artisan('make:class Services/FileService')
            ->expectsOutput($this->classConsoleOutput)
            ->assertExitCode(0);
    }

    /** @test */
    public function test_make_class_with_interface_flag()
    {
        $this->artisan('make:class Services/FileUploadService -i')
            ->expectsOutput($this->classConsoleOutput)
            ->expectsOutput($this->interfaceConsoleOutput)
            ->assertExitCode(0);
    }

    public function test_make_class_with_trait_flag()
    {
        $this->artisan('make:class Services/FileDownloadService -t')
            ->expectsOutput($this->classConsoleOutput)
            ->expectsOutput($this->traitConsoleOutput)
            ->assertExitCode(0);
    }

    public function test_make_class_with_abstract_class_flag()
    {
        $this->artisan('make:class Services/FileReloadService -c')
            ->expectsOutput($this->classConsoleOutput)
            ->expectsOutput($this->abstractClassConsoleOutput)
            ->assertExitCode(0);
    }

    public function test_make_class_with_all_flag()
    {
        $this->artisan('make:class Services/FileDeleteService -a')
            ->expectsOutput($this->classConsoleOutput)
            ->expectsOutput($this->interfaceConsoleOutput)
            ->expectsOutput($this->abstractClassConsoleOutput)
            ->expectsOutput($this->traitConsoleOutput)
            ->assertExitCode(0);
    }
}
