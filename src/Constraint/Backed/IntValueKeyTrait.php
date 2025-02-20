<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint\Backed;

use DecodeLabs\Coercion;
use DecodeLabs\Enumerable\EnumTrait;

trait IntValueKeyTrait
{
    /**
     * @use EnumTrait<string,int>
     */
    use EnumTrait;

    /**
     * @param ?int $key
     */
    public static function fromKey(
        int|string|null $key
    ): static {
        return static::fromValue(
            Coercion::tryInt($key)
        );
    }

    /**
     * @param ?int $key
     */
    public static function tryFromKey(
        int|string|null $key
    ): ?static {
        return static::tryFromValue(
            Coercion::tryInt($key)
        );
    }

    public function getKey(): int
    {
        return $this->value;
    }
}
