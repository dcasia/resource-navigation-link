<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink\Resources;

use Closure;

/**
 * @method static static make(string $label, string $url)
 */
class ExternalLink extends AbstractResource
{
    private string $url;

    private bool|Closure $openInNewTab = false;

    public function __construct(string $label, string $url)
    {
        parent::__construct($label);

        $this->url = $url;
    }

    public function openInNewTab(bool|Closure $openInNewTab = true): self
    {
        $this->openInNewTab = $openInNewTab;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'url' => $this->url,
            'openInNewTab' => value($this->openInNewTab),
        ]);
    }

    protected function component(): string
    {
        return 'external-link';
    }
}
