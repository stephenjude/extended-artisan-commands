<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Class Namespace
    |--------------------------------------------------------------------------
    |
    | Here you can configure the default namespace for
    | the make:class command.
    |
    */

    'class_namespace' => env('CLASS_NAMESPACE', ''),


    /*
    |--------------------------------------------------------------------------
    | Default Abstract Class Namespace
    |--------------------------------------------------------------------------
    |
    | Here you can configure the default namespace for
    | the make:abstract-class command.
    |
    */

    'abstract_class_namespace' => env('ABSTRACT_CLASS_NAMESPACE', ''),


    /*
    |--------------------------------------------------------------------------
    | Default Interface Namespace
    |--------------------------------------------------------------------------
    |
    | Here you can configure the default namespace for
    | the make:interface command.
    |
    */

    'interface_namespace' => env('INTERFACE_NAMESPACE', '\Contracts'),


    /*
    |--------------------------------------------------------------------------
    | Default Trait Namespace
    |--------------------------------------------------------------------------
    |
    | Here you can configure the default namespace for
    | the make:trait command.
    |
    */

    'trait_namespace' => env('TRAIT_NAMESPACE', '\Traits'),
];
