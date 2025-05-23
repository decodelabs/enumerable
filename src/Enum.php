<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable;

/**
 * @template TKey of int|string
 * @template TValue of int|string
 */
interface Enum
{
    public const bool CamelName = false;

    /**
     * @return list<static>
     */
    public static function getCases(): array;

    /**
     * @return array<TKey,string>
     */
    public static function getOptions(): array;

    /**
     * @param int|string|static|null $value
     */
    public static function fromAny(
        int|string|self|null $value
    ): static;

    /**
     * @param int|string|static|null $value
     */
    public static function tryFromAny(
        int|string|self|null $value
    ): ?static;

    public static function fromName(
        ?string $name
    ): static;

    public static function tryFromName(
        ?string $name
    ): ?static;

    public static function nameToLabel(
        ?string $name
    ): ?string;

    public function getName(): string;

    /**
     * @return array<string>
     */
    public static function getNames(): array;

    /**
     * @param TKey|null $key
     */
    public static function fromKey(
        int|string|null $key
    ): static;

    /**
     * @param TKey|null $key
     */
    public static function tryFromKey(
        int|string|null $key
    ): ?static;

    /**
     * @return TKey
     */
    public function getKey(): int|string;

    /**
     * @return array<TKey>
     */
    public static function getKeys(): array;

    public static function fromIndex(
        ?int $index
    ): static;

    public static function tryFromIndex(
        ?int $index
    ): ?static;


    public function getIndex(): int;

    public function getLabel(): string;

    /**
     * @param TValue|null $value
     */
    public static function fromValue(
        int|string|null $value
    ): static;

    /**
     * @param TValue|null $value
     */
    public static function tryFromValue(
        int|string|null $value
    ): ?static;

    /**
     * @return array<TKey,TValue>
     */
    public static function getValues(): array;

    /**
     * @return TValue
     */
    public function getValue(): int|string;



    /**
     * @return array<static>
     */
    public function getLessThan(
        bool $includeSelf = false
    ): array;

    /**
     * @return array<static>
     */
    public function getGreaterThan(
        bool $includeSelf = false
    ): array;
}
