<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use App\Nova\Resources\Resource;
use Laravel\Nova\Card;
use Laravel\Nova\Http\Requests\NovaRequest;

/**
 * @method static static make(Link[] $links)
 */
class ResourceNavigationLink extends Card
{
    public $component = 'resource-navigation-link';
    public $width = Card::FULL_WIDTH;

    public function __construct(
        private readonly array $links,
    )
    {
    }

    /**
     * @param class-string<Resource> $resource
     */
    public static function copyFromResource(string $resource): array
    {
        return collect(app()->call([ $resource::make(), 'cards' ]))
            ->filter(fn (Card $card) => $card instanceof static)
            ->toArray();
    }

    public function jsonSerialize(): array
    {
        $request = resolve(NovaRequest::class);

        $this->withMeta([
            'links' => collect($this->links)->filter(fn (Link $link) => $link->authorizedToSee($request)),
        ]);

        return parent::jsonSerialize();
    }
}
