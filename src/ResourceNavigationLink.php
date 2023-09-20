<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use Laravel\Nova\Card;

class ResourceNavigationLink extends Card
{
    public function __construct(array $resources)
    {
        $this->withMeta([ 'resources' => $resources ]);
    }

    public function component(): string
    {
        return 'resource-navigation-link';
    }

    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'width' => Card::FULL_WIDTH,
        ]);
    }
}
