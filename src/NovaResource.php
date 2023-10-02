<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink;

use App\Nova\Resources\Resource as BaseNovaResource;
use Illuminate\Support\Str;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Nova;

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
        $this->url = $this->generateUrl('%s/resources/%s/lens/%s', Nova::path(), $this->resourceUriKey, $resource::make()->uriKey());

        return $this;
    }

    public function index(): self
    {
        $this->url = $this->generateUrl('%s/resources/%s', Nova::path(), $this->resourceUriKey);

        return $this;
    }

    public function create(): self
    {
        $this->url = $this->generateUrl('%s/resources/%s/new', Nova::path(), $this->resourceUriKey);

        return $this;
    }

    public function update(int|string $resourceId): self
    {
        $this->url = $this->generateUrl('%s/resources/%s/%s/edit', Nova::path(), $this->resourceUriKey, $resourceId);

        return $this;
    }

    private function generateUrl(string $template, int|string ...$arguments): string
    {
        return Str::of(sprintf($template, ...$arguments))
            ->ltrim('/')
            ->prepend('/')
            ->value();
    }
}
