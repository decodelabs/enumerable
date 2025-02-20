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
     * @param ?int $value
     */
    public static function fromValue(
        int|string|null $value
    ): static {
        return static::from(
            Coercion::asInt($value)
        );
    }

    /**
     * @param ?int $value
     */
    public static function tryFromValue(
        int|string|null $value
    ): ?static {
        $value = Coercion::tryInt($value);

        if ($value === null) {
            return null;
        }

        return static::tryFrom($value);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
