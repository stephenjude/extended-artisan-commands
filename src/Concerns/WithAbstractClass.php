<?php

namespace Stephenjude\ExtendedArtisanCommands\Concerns;

use Illuminate\Support\Str;

trait WithAbstractClass
{
    /**
     * Prefix for abstract class name
     *
     * @var string
     */
    protected $classPrefix = 'Abstract';

    /**
     * Create an abstract class for the class.
     *
     * @return void
     */
    protected function createAbstractClass()
    {

        $className = $this->argument('name');

        $name = $this->qualifyClass($className);

        $baseName = class_basename($className);

        $alias = $this->classPrefix.$baseName;

        $abstractClass = Str::studly(str_replace($baseName, $alias,  (string) $name));

        $this->call('make:abstract-class', [
            'name' => "{$abstractClass}",
        ]);
    }

    /**
     * Replace the abstract class name for the given stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function replaceAbstractClassStubs($stub) : string
    {
        $alias = $this->classPrefix.$this->enumName;

        $namespace = $this->getAbstractClassNamespace($alias);

        $stub = str_replace('DummyAbstractClassNamespace', $namespace, $stub);

        $stub = str_replace('DummyAbstractClass', $alias, $stub);

        return $stub;
    }

    /**
     * Parse the abstract class name and format according to abstract class root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function getAbstractClassNamespace($name): string
    {
        $namespace = $this->rootNamespace().config('extended-artisan-commands.abstract_namespace')."\\$name";

        return str_replace('\\\\', '\\', $namespace);
    }
}


