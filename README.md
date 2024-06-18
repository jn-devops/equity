# Homeful Equity Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jn-devops/equity.svg?style=flat-square)](https://packagist.org/packages/jn-devops/equity)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jn-devops/equity/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jn-devops/equity/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jn-devops/equity/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jn-devops/equity/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jn-devops/equity.svg?style=flat-square)](https://packagist.org/packages/jn-devops/equity)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require jn-devops/equity
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="equity-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="equity-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="equity-views"
```

## Usage

```php
$equity = new Homeful\Equity();
echo $equity->echoPhrase('Hello, Homeful!');
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

- [Lester B. Hurtado](https://github.com/jn-devops)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
