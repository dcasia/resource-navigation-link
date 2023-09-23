<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use App\Nova\Resources\Resource as BaseNovaResource;
use Laravel\Nova\Lenses\Lens;

class NovaResource extends Link
{
    private string $resourceUriKey;

    /**
     * @param class-string<BaseNovaResource> $resource
     */
    public function using(string $resource): self
    {
        $this->resourceUriKey = $resource::uriKey();

        return $this->index();
    }

    /**
     * @param class-string<Lens> $resource
     */
    public function lens(string $resource): NovaResource
    {
        $this->url = sprintf('/resources/%s/lens/%s', $this->resourceUriKey, $resource::make()->uriKey());

        return $this;
    }

    public function index(): self
    {
        $this->url = sprintf('/resources/%s', $this->resourceUriKey);

        return $this;
    }

    public function create(): self
    {
        $this->url = sprintf('/resources/%s/new', $this->resourceUriKey);

        return $this;
    }

    public function update(int|string $resourceId): self
    {
        $this->url = sprintf('/resources/%s/%s/edit', $this->resourceUriKey, $resourceId);

        return $this;
    }
}
