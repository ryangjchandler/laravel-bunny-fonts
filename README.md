# Manage Bunny Fonts programatically in your Laravel projects.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/laravel-bunny-fonts.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-bunny-fonts)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ryangjchandler/laravel-bunny-fonts/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ryangjchandler/laravel-bunny-fonts/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ryangjchandler/laravel-bunny-fonts/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ryangjchandler/laravel-bunny-fonts/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/laravel-bunny-fonts.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-bunny-fonts)

This package provides a small set of utilities for managing Bunny Fonts programatically.

## Installation

You can install the package via Composer:

```bash
composer require ryangjchandler/laravel-bunny-fonts
```

## Usage

Inside of your `AppServiceProvider::boot()` method, use the `BunnyFonts` class to register font families and variants.

```php
use RyanChandler\BunnyFonts\Facades\BunnyFonts;
use RyanChandler\BunnyFonts\FontFamily;

public function boot()
{
    BunnyFonts::add(FontFamily::AbhayaLibre, weights: [400, 500, 600])
        ->add(FontFamily::FiraCode, weights: [
            400
        ]);
}
```

> This package provides a `FontFamily` enum that contains all fonts available on Bunny!
>
> If you want to preview a font, click through to the enum and use the handy link in the comment above the case.

Inside of your Blade templates, use the `<x-bunny-fonts />` component or `@bunnyFonts()` directive to render the necessary HTML tags and load your fonts.

### Sets

Out of the box this package provides a `default` set of fonts. Calling `add()` directly on the `BunnyFonts` class will register fonts under the `default` set.

If your site uses different fonts in different places, it's still possible to register them using this package by creating a custom "set".

```php
public function boot()
{
    BunnyFonts::set('shop')
        ->add(FontFamily::Inter, [400, 500, 700]);
}
```

Then when you use the Blade component or directive, you can provide the set you wish to render.

```blade
<x-bunny-fonts set="shop" />
<!-- or... -->
@bunnyFonts('shop')
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
