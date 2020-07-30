# Extended Artisan Commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/extended-artisan-commands.svg?style=flat-square)](https://packagist.org/packages/stephenjude/extended-artisan-commands)
[![Build Status](https://img.shields.io/travis/stephenjude/extended-artisan-commands/master.svg?style=flat-square)](https://travis-ci.org/stephenjude/extended-artisan-commands)

Have you ever enjoyed the assistance of artisan commands? This package brings more of it :)

You can now generate PHP classes and traits using artisan `make:class`,  `make:interface`, `make:trait` or `make:abstract-class` console commands.

## Installation
### Step 1: Install Through Composer
```bash
composer require stephenjude/extended-artisan-commands --dev
```
### Step 2: Run Artisan!
You're all set. Run php artisan from the console, and you'll see the new commands in the make:* namespace section.
- make:class
- make:interface
- make:trait
- make:abstract-class

## Usage
Here's a few other examples of commands that you might write:

``` bash
php artisan make:class Services/EmailForwarderService
```
``` bash
php artisan make:abstract-class Services/AbstractEmailForwarder
```
``` bash
php artisan make:interface EmailForwarderContract
```
``` bash
php artisan make:trait FileUpload
```
### Option for all the commands
--force This will overide the existing file, if it exist

### Options for the `make:class` command
- `--interface` OR `-i` This will generate an interface for the generated class. 
- `--trait` OR `-t` This will generate a trait for the generated class. 
- `--abstract` OR `-c` This will generate an abstract class for the generated class. 
- `--all` OR `-a` This will generate an interface, a trait and an abstract class for the generated class. 

### Default Namespaces
 - All interfaces are generated under the `App/Contracts` namespace.
 - All traits are generated under the `App/Traits` namespace.
 - Classes and abstract classes are generated under the `App` namespace.

Default namespaces can be configured inside the package config file. 

## Configurations
You can configure default namespace by publishing the package config file:
```bash 
php artisan vendor:publish --provider="Stephenjude\ExtendedArtisanCommands\ExtendedArtisanCommandsServiceProvider" --tag="config"
```
### Configuring Default Namespace
```php
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
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email stephenjudesuccess@gmail.com instead of using the issue tracker.

## Credits

- [Stephen Jude](https://github.com/stephenjude)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
