<?php

namespace DigitalCreative\ResourceNavigationLink;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ResourceNavigationLinkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(static function (ServingNova $event) {
            Nova::script('resource-navigation-link', __DIR__ . '/../dist/js/card.js');
        });
    }
}
