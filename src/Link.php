<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use App\Nova\Resources\Resource as BaseNovaResource;
use Closure;
use JsonSerializable;
use Laravel\Nova\AuthorizedToSee;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Makeable;
use Laravel\Nova\Nova;
use Laravel\Nova\Filters\FilterEncoder;

/**
 * @method static static make(string $label)
 */
class Link implements JsonSerializable
{
    use AuthorizedToSee, Makeable;

    private bool $external = false;

    private bool|Closure $openInNewTab = false;

    protected string $url;

    public function __construct(
        private readonly string $label,
    )
    {
    }

    /**
     * @param class-string<BaseNovaResource> $resource
     */
    public static function toResourceIndex(string $resource, ?string $label = null): self
    {
        return static::make($label ?: $resource::label())->resource($resource);
    }

    /**
     * Creates a link to a Nova resource index with filters applied.
     *
     * @param class-string<BaseNovaResource> $resource
     * @param class-string<Filter> $filterClass
     * @param string $label
     * @return self
     */
    public static function toFilteredResourceIndex(string $resource, string $filterClass, int $value, string $label): self
    {
        $filters = new FilterEncoder([
            [
                $filterClass => $value,
            ],
        ]);

        $url = Nova::path() . '/resources/' . $resource::uriKey() . '?' . $resource::uriKey(). '_filter' . '=' . $filters->encode();

        return static::make($label)
            ->url($url, false)
            ->openInNewTab(false);
    }

    /**
     * @param class-string<BaseNovaResource> $resource
     */
    public static function toResourceCreate(string $resource, ?string $label = null): self
    {
        return static::make($label ?: $resource::label())->resource($resource)->create();
    }

    /**
     * @param class-string<BaseNovaResource> $resource
     * @param class-string<Lens> $lens
     */
    public static function toLens(string $resource, string $lens, ?string $label = null): self
    {
        return static::make($label ?: $lens::make()->name())->resource($resource)->lens($lens);
    }

    public static function toExternalUrl(string $label, string $url, bool $openInNewTab = true): self
    {
        return static::make($label)->url($url)->openInNewTab($openInNewTab);
    }

    /**
     * @param class-string<BaseNovaResource> $resource
     */
    public function resource(string $resource): NovaResource
    {
        return NovaResource::make($this->label)->using($resource);
    }

    /**
     * @param class-string<Lens> $resource
     */
    public function lens(string $resource): NovaResource
    {
        return NovaResource::make($this->label)->lens($resource);
    }

    public function url(string $url, bool $external = true): self
    {
        $this->url = $url;

        return $this->external($external);
    }

    public function external(bool $external): self
    {
        $this->external = $external;

        return $this;
    }

    public function openInNewTab(bool|Closure $openInNewTab = true): self
    {
        $this->openInNewTab = $openInNewTab;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'label' => $this->label,
            'url' => $this->url,
            'external' => $this->external,
            'openInNewTab' => value($this->openInNewTab),
        ];
    }
}
