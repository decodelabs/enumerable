<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint;

use DecodeLabs\Coercion;
use DecodeLabs\Enumerable\EnumTrait;

/**
 * @template TValue of int|string
 */
trait IndexKeyTrait
{
    /**
     * @use EnumTrait<int,TValue>
     */
    use EnumTrait;

    /**
     * @param ?int $key
     */
    public static function fromKey(
        int|string|null $key
    ): static {
        return static::fromIndex(
            Coercion::toIntOrNull($key)
        );
    }

    /**
     * @param ?int $key
     */
    public static function tryFromKey(
        int|string|null $key
    ): ?static {
        return static::tryFromIndex(
            Coercion::toIntOrNull($key)
        );
    }

    public function getKey(): int
    {
        return $this->getIndex();
    }
}
