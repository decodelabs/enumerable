<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint\Unit;

use DecodeLabs\Coercion;

trait NameValueTrait
{
    /**
     * @param ?string $name
     */
    public static function fromValue(
        int|string|null $name
    ): static {
        return static::fromName(
            Coercion::tryString($name)
        );
    }

    /**
     * @param ?string $name
     */
    public static function tryFromValue(
        int|string|null $name
    ): ?static {
        return static::tryFromName(
            Coercion::tryString($name)
        );
    }

    public function getValue(): string
    {
        return $this->name;
    }
}
