<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ResourceNavigationLinkServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Nova::serving(static function (ServingNova $event): void {

            Nova::script('resource-navigation-link', __DIR__ . '/../dist/js/card.js');
            Nova::style('resource-navigation-link', __DIR__ . '/../dist/css/card.css');

        });
    }
}
