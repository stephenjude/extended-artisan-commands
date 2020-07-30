<?php

namespace Stephenjude\ExtendedArtisanCommands\Concerns;

trait WithStubCleaner
{
    protected function cleanStubs($stub) : string
    {
        if ($this->option('all')) {
            return $stub;
        }

        $stub = $this->cleanTraitStub($stub);
        $stub = $this->cleanInterfaceStub($stub);
        $stub = $this->cleanAbstractClassStub($stub);

        $stub = preg_replace('/\n\n\n/', PHP_EOL.PHP_EOL, $stub);
        $stub = preg_replace('/\n\n\n\n/', PHP_EOL, $stub);

        return $stub;
    }

    public function cleanTraitStub($stub) : string
    {
        if (! $this->option('trait')) {
            $stub = str_replace('use DummyTraitNamespace;', '', $stub);
            $stub = str_replace('   use DummyTrait;', '', $stub);
        }
        return $stub;
    }

    public function cleanInterfaceStub($stub) : string
    {
        if (! $this->option('interface')) {
            $stub = str_replace('use DummyInterfaceNamespace;', '', $stub);
            $stub = str_replace('implements DummyInterface', '', $stub);
        }
        return $stub;
    }

    public function cleanAbstractClassStub($stub) : string
    {
        if (! $this->option('abstract')) {
            $stub = str_replace('use DummyAbstractClassNamespace;', '', $stub);
            $stub = str_replace('extends DummyAbstractClass ', '', $stub);
        }
        return $stub;
    }
}
