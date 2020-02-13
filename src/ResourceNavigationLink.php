<?php

namespace DigitalCreative\ResourceNavigationLink;

use Laravel\Nova\Card;

class ResourceNavigationLink extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/2';

    /**
     * ResourceNavigationCard constructor.
     *
     * @param array $resources
     */
    public function __construct(array $resources)
    {
        $this->withMeta([ 'resources' => $resources ]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'resource-navigation-link';
    }
}
