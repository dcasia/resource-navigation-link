<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use Closure;
use JsonSerializable;
use Laravel\Nova\AuthorizedToSee;
use Laravel\Nova\Makeable;

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
     * @param class-string<resource> $resource
     */
    public function resource(string $resource): NovaResource
    {
        return NovaResource::make($this->label)->using($resource);
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
