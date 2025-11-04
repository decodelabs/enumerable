<?php

/**
 * Enumerable
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint\Backed;

trait ValueLabelTrait
{
    public function getLabel(): string
    {
        return (string)$this->value;
    }
}
