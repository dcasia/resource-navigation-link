<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use Laravel\Nova\Card;
use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * @method static static make(Link[] $links)
 */
class ResourceNavigationLink extends Card
{
    public function __construct(
        private readonly array $links,
    )
    {
        parent::__construct('resource-navigation-link');
    }

    public function jsonSerialize(): array
    {
        $request = resolve(NovaRequest::class);

        $this->withMeta([
            'links' => collect($this->links)->filter(fn (Link $link) => $link->authorizedToSee($request)),
        ]);

        return array_merge(parent::jsonSerialize(), [
            'width' => Card::FULL_WIDTH,
        ]);
    }
}
