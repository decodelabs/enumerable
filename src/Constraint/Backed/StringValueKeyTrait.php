<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint\Backed;

use DecodeLabs\Coercion;
use DecodeLabs\Enumerable\EnumTrait;

trait StringValueKeyTrait
{
    /**
     * @use EnumTrait<string,string>
     */
    use EnumTrait;

    /**
     * @param ?string $key
     */
    public static function fromKey(
        int|string|null $key
    ): static {
        return static::fromValue(
            Coercion::toStringOrNull($key)
        );
    }

    /**
     * @param ?string $key
     */
    public static function tryFromKey(
        int|string|null $key
    ): ?static {
        return static::tryFromValue(
            Coercion::toStringOrNull($key)
        );
    }

    public function getKey(): string
    {
        return $this->value;
    }
}
