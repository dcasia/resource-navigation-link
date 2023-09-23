# Resource Navigation Link

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/resource-navigation-link)](https://packagist.org/packages/digital-creative/resource-navigation-link)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/resource-navigation-link)](https://packagist.org/packages/digital-creative/resource-navigation-link)
[![License](https://img.shields.io/packagist/l/digital-creative/resource-navigation-link)](https://github.com/dcasia/resource-navigation-link/blob/master/LICENSE)

This package is very similar to the https://github.com/dcasia/resource-navigation-tab (visually they are identical)
however internally they works differently.

The main difference is that this package is a *Card* (not a field), and it links to other resources instead of filtering the current resource

# Installation

You can install the package via composer:

```
composer require digital-creative/resource-navigation-link
```

## Basic Usage

```php
use DigitalCreative\ResourceNavigationLink\ResourceNavigationLink;
use DigitalCreative\ResourceNavigationLink\Link;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource {

    public function cards(NovaRequest $request): array
    {
        return [
            ResourceNavigationLink::make([
                Link::toResourceIndex(User::class),
                Link::toResourceIndex(Article::class),
                Link::toLens(Article::class, MostViewed::class),
                Link::toExternalUrl('Documentation', 'https://laravel.com/docs/10.x/readme'),
            ]),
        ];
    }

}

/**
 * Optional: if you want to copy the navigation links from another resource
 */
class Article extends Resource {

    public function cards(NovaRequest $request): array
    {
        return [
            ...ResourceNavigationLink::copyFromResource(User::class),
        ];
    }

}
```

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/resource-navigation-link/master/LICENSE) for more information.
