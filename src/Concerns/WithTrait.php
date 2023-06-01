<?php

namespace Stephenjude\ExtendedArtisanCommands\Concerns;

use Illuminate\Support\Str;

trait WithTrait
{
    /**
     * Create an trait for the class.
     *
     * @return void
     */
    protected function createTrait()
    {
        $trait = Str::studly(class_basename($this->argument('name')));

        $this->call('make:trait', [
            'name' => "{$trait}",
        ]);
    }

    /**
     * Replace the trait name for the given stub.
     *
     * @param  string  $stub
     */
    protected function replaceTraitStubs($stub): string
    {
        $namespace = $this->getTraitNamespace($this->enumName);

        $alias = $this->enumName.'Trait';

        $useTrait = "$namespace as $alias";

        $stub = str_replace('DummyTraitNamespace', $useTrait, $stub);

        $stub = str_replace('DummyTrait', $alias, $stub);

        return $stub;
    }

    /**
     * Parse the trait name and format according to trait root namespace.
     *
     * @param  string  $name
     */
    protected function getTraitNamespace($name): string
    {
        $namespace = $this->rootNamespace().config('extended-artisan-commands.trait_namespace')."\\$name";

        return str_replace('\\\\', '\\', $namespace);
    }
}
