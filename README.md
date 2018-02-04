# static-cache

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

PHP simple static cache class

## Install

Via Composer

``` bash
$ composer require gregoriohc/static-cache
```

## Usage

### Checking for item existence

``` php
if (Cache::has('key')) {
    // ...
}
```

### Storing item

``` php
Cache::set('key', 'value');
```

### Retrieving item

``` php
$value = Cache::get('key');
```

If you wish, you may pass a second argument to the `get` method specifying the default value you wish to be returned if the item doesn't exist:

``` php
$value = Cache::get('key', 'default');
```

You may even pass a `Closure` as the default value. The result of the `Closure` will be returned if the specified item does not exist in the cache:

``` php
Cache::get('key', function() {
    return 'value';
});
```

### Retrieve and store item

Sometimes you may wish to retrieve an item from the cache, but also store a default value if the requested item doesn't exist. You may do this using the `remember` method:

``` php
Cache::remember('key', function() {
    return 'value';
});
```

If the item does not exist in the cache, the Closure passed to the remember method will be executed and its result will be placed in the cache.

### Removing item

``` php
Cache::forget('key');
```

## Testing

``` bash
$ composer test
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gregoriohc@gmail.com instead of using the issue tracker.

## Socialware

You're free to use this package, but if it makes it to your production environment I highly appreciate you sharing it on any social network.

## Credits

- [Gregorio Hernández Caso][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gregoriohc/static-cache.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gregoriohc/static-cache/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/gregoriohc/static-cache.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/gregoriohc/static-cache.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gregoriohc/static-cache.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gregoriohc/static-cache
[link-travis]: https://travis-ci.org/gregoriohc/static-cache
[link-scrutinizer]: https://scrutinizer-ci.com/g/gregoriohc/static-cache/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/gregoriohc/static-cache
[link-downloads]: https://packagist.org/packages/gregoriohc/static-cache
[link-author]: https://github.com/gregoriohc
[link-contributors]: ../../contributors
