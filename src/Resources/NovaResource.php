<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink\Resources;

/**
 * @method static static make(string $label, string $resource)
 */
class NovaResource extends AbstractResource
{
    private string $resource;

    private string $url;

    public function __construct(string $label, string $resource)
    {
        parent::__construct($label);

        $this->resource = $resource;
        $this->index();
    }

    public function index(): self
    {
        $this->url = sprintf('/resources/%s', $this->resource::uriKey());

        return $this;
    }

    public function create(): self
    {
        $this->url = sprintf('/resources/%s/new', $this->resource::uriKey());

        return $this;
    }

    public function update(int|string $resourceId): self
    {
        $this->url = sprintf('/resources/%s/%s/edit', $this->resource::uriKey(), $resourceId);

        return $this;
    }

    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'url' => $this->url,
        ]);
    }

    protected function component(): string
    {
        return 'nova-resource';
    }
}
