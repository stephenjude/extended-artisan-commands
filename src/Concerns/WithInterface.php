<?php

namespace Stephenjude\ExtendedArtisanCommands\Concerns;

use Illuminate\Support\Str;

trait WithInterface
{
    /**
     * Prefix for using interface in a class
     *
     * @var string
     */
    protected $suffix = 'Contract';

    /**
     * Create an interface for the class.
     *
     * @return void
     */
    protected function createInterface()
    {
        $interface = Str::studly(class_basename($this->argument('name')));

        $this->call('make:interface', [
            'name' => "{$interface}",
        ]);
    }

    /**
     * Replace the interface name for the given stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceInterfaceStubs($stub) : string
    {
        $namespace = $this->getInterfaceNamespace($this->enumName);

        $alias = $this->enumName.$this->suffix;

        $stub = str_replace('DummyInterfaceNamespace', "$namespace as $alias", $stub);

        $stub = str_replace('DummyInterface', $alias, $stub);

        return $stub;
    }

    /**
     * Parse the interface name and format according to interface root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function getInterfaceNamespace($name): string
    {
        $namespace = $this->rootNamespace().config('extended-artisan-commands.interface_namespace')."\\$name";

        return str_replace('\\\\', '\\', $namespace);
    }
}
