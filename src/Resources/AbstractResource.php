<?php

declare(strict_types = 1);

namespace DigitalCreative\ResourceNavigationLink\Resources;

use JsonSerializable;
use Laravel\Nova\Makeable;

abstract class AbstractResource implements JsonSerializable
{
    use Makeable;

    public function __construct(
        private readonly string $label,
    )
    {
    }

    abstract protected function component(): string;

    public function jsonSerialize(): array
    {
        return [
            'component' => $this->component(),
            'label' => $this->label,
        ];
    }
}
