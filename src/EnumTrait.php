<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable;

use DecodeLabs\Exceptional;

/**
 * @template TKey of int|string
 * @template TValue of int|string
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


    public static function fromName(
        ?string $name
    ): static {
        if (null !== ($value = static::tryFromName($name))) {
            return $value;
        }

        throw Exceptional::InvalidArgument(
            'Unknown label: ' . $name
        );
    }

    public static function tryFromName(
        ?string $name
    ): ?static {
        foreach (static::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }

        return null;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public static function fromIndex(
        ?int $index
    ): static {
        if (null !== ($value = static::tryFromIndex($index))) {
            return $value;
        }

        throw Exceptional::InvalidArgument(
            'Unknown index: ' . $index
        );
    }

    public static function tryFromIndex(
        ?int $index
    ): ?static {
        if ($index === null) {
            return null;
        }

        return static::getIndexedCases()[$index] ?? null;
    }

    /**
     * @return array<int,static>
     */
    public static function getIndexedCases(): array
    {
        return array_values(static::cases());
    }

    public function getIndex(): int
    {
        return (int)array_search($this, static::getIndexedCases(), true);
    }

    /**
     * @return array<TKey, TValue>
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
