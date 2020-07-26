# Extended Artisan Commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/extended-artisan-commands.svg?style=flat-square)](https://packagist.org/packages/stephenjude/extended-artisan-commands)
[![Build Status](https://img.shields.io/travis/stephenjude/extended-artisan-commands/master.svg?style=flat-square)](https://travis-ci.org/stephenjude/extended-artisan-commands)

Have you ever enjoyed the assistance of artisan commands? This packages brings more of it.

You can now generate PHP classes and traits using artisan `make:class` or `make:trait` console commands.

## Installation

### Step 1: Install Through Composer
```bash
composer require stephenjude/extended-artisan-commands --dev
```
### Step 2: Run Artisan!
You're all set. Run php artisan from the console, and you'll see the new commands in the make:* namespace section.

## Usage
### Creating A PHP Class
You can generate a class by calling the artisan `make:class` command followed by the name of the class. 
``` bash
php artisan make:class Services/EmailService
```
This `EmailService` class will be saved inside the `app/Services` directory and if the directory does not exist it will be created for you.

### Creating A PHP Trait
You can generate a trait by calling the artisan `make:trait` command followed by the name of the trait. 
``` bash
php artisan make:trait FileUpload
```
All traits will be saved inside the app/Traits directory unless you spacify another namespace.

### Overridng Existing Class or Trait
To override an existing class or trait you have to pass the `--force` option to your command.
``` bash
php artisan make:class Services/EmailService --force

php artisan make:trait FileUpload --force
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
