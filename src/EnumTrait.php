<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable;

use DecodeLabs\Coercion;
use DecodeLabs\Exceptional;

/**
 * @template TKey of int|string
 * @template TValue of int|string
 * @phpstan-require-implements Enum<TKey, TValue>
 */
trait EnumTrait
{
    /**
     * Redeclare cases() for naming consistency
     *
     * @return array<static>
     */
    public static function getCases(): array
    {
        return static::cases();
    }

    /**
     * @return array<TKey, string>
     */
    public static function getOptions(): array
    {
        $output = [];

        foreach (static::cases() as $case) {
            $output[$case->getKey()] = $case->getLabel();
        }

        return $output;
    }


    /**
     * @param int|string|static|null $value
     */
    public static function fromAny(
        string|int|Enum|null $value
    ): static {
        if (null !== ($output = static::tryFromAny($value))) {
            return $output;
        }

        throw Exceptional::InvalidArgument(
            message: 'Unknown value: ' . Coercion::asString($value)
        );
    }

    /**
     * @param int|string|static|null $value
     */
    public static function tryFromAny(
        string|int|Enum|null $value
    ): ?static {
        if (
            $value instanceof static ||
            $value === null
        ) {
            return $value;
        }

        if (is_int($value)) {
            return static::tryFromValue($value);
        }

        if (null !== ($output = static::tryFromName($value))) {
            return $output;
        }

        if (null !== ($output = static::tryFromValue($value))) {
            return $output;
        }

        return null;
    }


    public static function fromName(
        ?string $name
    ): static {
        if (null !== ($value = static::tryFromName($name))) {
            return $value;
        }

        throw Exceptional::InvalidArgument(
            message: 'Unknown label: ' . $name
        );
    }

    public static function tryFromName(
        ?string $name
    ): ?static {
        if ($name === null) {
            return null;
        }

        $uName = ucfirst($name);

        foreach (static::cases() as $case) {
            if (
                $case->name === $name ||
                $case->name === $uName
            ) {
                return $case;
            }
        }

        return null;
    }

    public static function nameToLabel(
        ?string $name
    ): ?string {
        return static::tryFromName($name)?->getLabel();
    }

    public function getName(): string
    {
        // @phpstan-ignore-next-line
        if(self::CamelName) {
            return lcfirst($this->name);
        }

        return $this->name;
    }

    /**
     * @return array<string>
     */
    public static function getNames(): array
    {
        $output = [];

        foreach (static::cases() as $case) {
            $output[] = $case->getName();
        }

        return $output;
    }


    /**
     * @return array<TKey>
     */
    public static function getKeys(): array
    {
        $output = [];

        foreach (static::cases() as $case) {
            $output[] = $case->getKey();
        }

        return $output;
    }


    public static function fromIndex(
        ?int $index
    ): static {
        if (null !== ($value = static::tryFromIndex($index))) {
            return $value;
        }

        throw Exceptional::InvalidArgument(
            message: 'Unknown index: ' . $index
        );
    }

    public static function tryFromIndex(
        ?int $index
    ): ?static {
        if ($index === null) {
            return null;
        }

        return static::getCases()[$index] ?? null;
    }

    public function getIndex(): int
    {
        return (int)array_search($this, static::getCases(), true);
    }

    /**
     * @return array<TKey,TValue>
     */
    public static function getValues(): array
    {
        $output = [];

        foreach (static::cases() as $case) {
            $output[$case->getKey()] = $case->getValue();
        }

        return $output;
    }
}
