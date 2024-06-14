<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint\Backed;

use DecodeLabs\Coercion;

trait IntValueTrait
{
    /**
     * @param ?int $name
     */
    public static function fromValue(
        int|string|null $name
    ): static {
        return static::from(
            Coercion::toInt($name)
        );
    }

    /**
     * @param ?int $name
     */
    public static function tryFromValue(
        int|string|null $name
    ): ?static {
        return static::tryFrom(
            Coercion::toInt($name)
        );
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
