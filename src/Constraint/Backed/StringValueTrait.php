<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint\Backed;

use DecodeLabs\Coercion;

trait StringValueTrait
{
    /**
     * @param ?string $name
     */
    public static function fromValue(
        int|string|null $name
    ): static {
        return static::from(
            Coercion::toString($name)
        );
    }

    /**
     * @param ?string $name
     */
    public static function tryFromValue(
        int|string|null $name
    ): ?static {
        return static::tryFrom(
            Coercion::toString($name)
        );
    }

    public function getValue(): string
    {
        return (string)$this->value;
    }
}
