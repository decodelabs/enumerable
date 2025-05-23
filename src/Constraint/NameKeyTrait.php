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
trait NameKeyTrait
{
    /**
     * @use EnumTrait<string,TValue>
     */
    use EnumTrait;

    /**
     * @param ?string $key
     */
    public static function fromKey(
        int|string|null $key
    ): static {
        return static::fromName(
            Coercion::tryString($key)
        );
    }

    /**
     * @param ?string $key
     */
    public static function tryFromKey(
        int|string|null $key
    ): ?static {
        return static::tryFromName(
            Coercion::tryString($key)
        );
    }

    public function getKey(): string
    {
        return $this->getName();
    }
}
