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

class ExampleNovaResource extends Resource {

    public function cards(Request $request)
    {
        return [
            ResourceNavigationLink::make([
                'Resource 1' => NovaResource::make(...),
                'Resource 2' => LensResource::make(...),
                'Resource 3' => InternalLink::make(...),
                'Resource 4' => ExternalLink::make(...),
                'Resource 5' => RawResource::make(...),
            ])
        ];
    }

}
```

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/resource-navigation-link/master/LICENSE) for more information.
