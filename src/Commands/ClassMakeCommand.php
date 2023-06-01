<?php

namespace Stephenjude\ExtendedArtisanCommands\Commands;

use Illuminate\Console\GeneratorCommand;
use Stephenjude\ExtendedArtisanCommands\Concerns\WithAbstractClass;
use Stephenjude\ExtendedArtisanCommands\Concerns\WithInterface;
use Stephenjude\ExtendedArtisanCommands\Concerns\WithStubCleaner;
use Stephenjude\ExtendedArtisanCommands\Concerns\WithTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ClassMakeCommand extends GeneratorCommand
{
    use WithInterface, WithAbstractClass, WithTrait, WithStubCleaner;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Class';

    /**
     * The name of class being generated.
     *
     * @var string
     */
    protected $className;

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->setUp();

        if (parent::handle() === false && ! $this->option('force')) {
            return false;
        }

        if ($this->option('interface')) {
            $this->createInterface();
        }

        if ($this->option('abstract')) {
            $this->createAbstractClass();
        }

        if ($this->option('trait')) {
            $this->createTrait();
        }
    }

    public function setUp(): void
    {
        $this->className = class_basename($this->argument('name'));

        if ($this->option('all')) {
            $this->input->setOption('interface', true);
            $this->input->setOption('abstract', true);
            $this->input->setOption('trait', true);
        }
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);

        $stub = str_replace('DummyClass', $this->className, $stub);

        if ($this->option('interface')) {
            $stub = $this->replaceInterfaceStubs($stub);
        }

        if ($this->option('abstract')) {
            $stub = $this->replaceAbstractClassStubs($stub);
        }

        if ($this->option('trait')) {
            $stub = $this->replaceTraitStubs($stub);
        }

        $stub = $this->cleanStubs($stub);

        return $stub;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/class.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.config('extended-artisan-commands.class_namespace');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate an interface, an abstract class and a trait for the class'],
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the class already exists'],
            ['interface', 'i', InputOption::VALUE_NONE, 'Create a new interface for the class'],
            ['abstract', 'c', InputOption::VALUE_NONE, 'Create a new abstract class for the class'],
            ['trait', 't', InputOption::VALUE_NONE, 'Create a new trait for the class'],
        ];
    }
}
