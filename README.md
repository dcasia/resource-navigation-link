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

## ⭐️ Show Your Support

Please give a ⭐️ if this project helped you!

### Other Packages You Might Like

- [Nova Welcome Card](https://github.com/dcasia/nova-welcome-card) - A configurable version of the `Help card` that comes with Nova.
- [Icon Action Toolbar](https://github.com/dcasia/icon-action-toolbar) - Replaces the default boring action menu with an inline row of icon-based actions.
- [Expandable Table Row](https://github.com/dcasia/expandable-table-row) - Provides an easy way to append extra data to each row of your resource tables.
- [Collapsible Resource Manager](https://github.com/dcasia/collapsible-resource-manager) - Provides an easy way to order and group your resources on the sidebar.
- [Resource Navigation Tab](https://github.com/dcasia/resource-navigation-tab) - Organize your resource fields into tabs.
- [Resource Navigation Link](https://github.com/dcasia/resource-navigation-link) - Create links to internal or external resources.
- [Nova Mega Filter](https://github.com/dcasia/nova-mega-filter) - Display all your filters in a card instead of a tiny dropdown!
- [Nova Pill Filter](https://github.com/dcasia/nova-pill-filter) - A Laravel Nova filter that renders into clickable pills.
- [Nova Slider Filter](https://github.com/dcasia/nova-slider-filter) - A Laravel Nova filter for picking range between a min/max value.
- [Nova Range Input Filter](https://github.com/dcasia/nova-range-input-filter) - A Laravel Nova range input filter.
- [Nova FilePond](https://github.com/dcasia/nova-filepond) - A Nova field for uploading File, Image and Video using Filepond.
- [Custom Relationship Field](https://github.com/dcasia/custom-relationship-field) - Emulate HasMany relationship without having a real relationship set between resources.
- [Column Toggler](https://github.com/dcasia/column-toggler) - A Laravel Nova package that allows you to hide/show columns in the index view.
- [Batch Edit Toolbar](https://github.com/dcasia/batch-edit-toolbar) - Allows you to update a single column of a resource all at once directly from the index page.

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/resource-navigation-link/master/LICENSE) for more information.
