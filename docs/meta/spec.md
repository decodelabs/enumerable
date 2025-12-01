# Enumerable — Package Specification

> **Cluster:** `language`
> **Language:** `php`
> **Milestone:** `m1`
> **Repo:** `https://github.com/decodelabs/enumerable`
> **Role:** Enum traits

This document describes the purpose, contracts, and design of **Enumerable** within the Decode Labs ecosystem.

It is aimed at:

- Developers **using** Enumerable in their own applications or libraries.
- Contributors **maintaining or extending** Enumerable.
- Tools and AI assistants that need to reason about its behaviour.

---

## 1. Overview

### 1.1 Purpose

Enumerable provides helper traits for PHP enums. It defines a powerful top-level `Enum` interface that expands the range of functionality enums provide whilst consolidating the same functionality across both `UnitEnum` and `BackedEnum` types. It provides type-specific interfaces and traits for different enum patterns, unified instantiation methods (fromKey, fromValue, fromName, fromIndex), list generation methods (getOptions, getValues, getCases), comparison methods (getLessThan, getGreaterThan), and label generation from enum names. It's designed to unlock the full power of PHP enums with consistent APIs across all enum types.

### 1.2 Non-Goals

Enumerable does **not**:

- Provide enum validation — it's a helper library
- Handle enum serialization — it uses built-in enum serialization
- Provide enum persistence — it's a runtime library
- Handle enum versioning — it's a static library
- Provide enum inheritance — PHP enums don't support inheritance
- Handle enum composition — it's a trait-based library
- Provide enum reflection — it uses built-in reflection
- Handle enum metadata — it's a functional library

---

## 2. Role in the Ecosystem

### 2.1 Cluster & Positioning

- **Cluster:** `language` (see Chorus taxonomy)
- Enumerable is a language package that provides helper traits for PHP enums in the Decode Labs ecosystem. It sits in the language cluster alongside other language-level utilities. It depends on Coercion and Exceptional. It's used throughout the ecosystem by packages like Nuance, Monarch, Slingshot, Atlas, Harvest, Chronicle, Destiny, and Prophet for enum handling. It provides the foundation for consistent enum usage across the ecosystem.

### 2.2 Typical Usage Contexts

Typical places Enumerable appears:

- Enum instantiation from various sources
- Enum list generation for UI components
- Enum comparison and ordering
- Enum label generation for display
- Enum key/value mapping
- Enum validation and conversion
- Enum iteration and filtering
- Enum serialization support

Enumerable is intended to be used whenever code needs to work with PHP enums in a consistent and powerful way.

---

## 3. Public Surface

> This section focuses on the conceptual API, not every symbol.

### 3.1 Key Types

The primary public types are:

- `DecodeLabs\Enumerable\Enum`
  Base interface for all enumerable enums. Extends functionality of both `UnitEnum` and `BackedEnum`. Defines unified API for key, value, label, name, and index operations.

- `DecodeLabs\Enumerable\EnumTrait`
  Base trait providing common enum functionality. Implements methods for instantiation, list generation, comparison, and name/label operations.

- `DecodeLabs\Enumerable\Unit\Named`
  Interface for unit enums with name-based keys. Extends `Enum<string,string>` and `UnitEnum`. Key = name, Value = name, Label = formatted name.

- `DecodeLabs\Enumerable\Unit\NamedTrait`
  Trait providing named unit enum implementation. Uses `NameKeyTrait`, `NameLabelTrait`, and `NameValueTrait`.

- `DecodeLabs\Enumerable\Unit\Indexed`
  Interface for unit enums with index-based keys. Extends `Enum<int,string>` and `UnitEnum`. Key = index, Value = name, Label = formatted name.

- `DecodeLabs\Enumerable\Unit\IndexedTrait`
  Trait providing indexed unit enum implementation. Uses `IndexKeyTrait`, `NameLabelTrait`, and `NameValueTrait`.

- `DecodeLabs\Enumerable\Backed\NamedString`
  Interface for string-backed enums with name-based keys. Extends `Enum<string,string>` and `BackedEnum`. Key = name, Value = enum value, Label = formatted name.

- `DecodeLabs\Enumerable\Backed\NamedStringTrait`
  Trait providing named string-backed enum implementation. Uses `NameKeyTrait`, `NameLabelTrait`, and `StringValueTrait`.

- `DecodeLabs\Enumerable\Backed\LabelledString`
  Interface for string-backed enums with value-based labels. Extends `Enum<string,string>` and `BackedEnum`. Key = name, Value = enum value, Label = enum value.

- `DecodeLabs\Enumerable\Backed\LabelledStringTrait`
  Trait providing labelled string-backed enum implementation. Uses `NameKeyTrait`, `ValueLabelTrait`, and `StringValueTrait`.

- `DecodeLabs\Enumerable\Backed\ValueString`
  Interface for string-backed enums with value-based keys. Extends `Enum<string,string>` and `BackedEnum`. Key = enum value, Value = enum value, Label = formatted name.

- `DecodeLabs\Enumerable\Backed\ValueStringTrait`
  Trait providing value string-backed enum implementation. Uses `StringValueKeyTrait`, `NameLabelTrait`, and `StringValueTrait`.

- `DecodeLabs\Enumerable\Backed\NamedInt`
  Interface for int-backed enums with name-based keys. Extends `Enum<string,int>` and `BackedEnum`. Key = name, Value = enum value, Label = formatted name.

- `DecodeLabs\Enumerable\Backed\NamedIntTrait`
  Trait providing named int-backed enum implementation. Uses `NameKeyTrait`, `NameLabelTrait`, and `IntValueTrait`.

- `DecodeLabs\Enumerable\Backed\ValueInt`
  Interface for int-backed enums with value-based keys. Extends `Enum<int,int>` and `BackedEnum`. Key = enum value, Value = enum value, Label = formatted name.

- `DecodeLabs\Enumerable\Backed\ValueIntTrait`
  Trait providing value int-backed enum implementation. Uses `IntValueKeyTrait`, `NameLabelTrait`, and `IntValueTrait`.

- `DecodeLabs\Enumerable\Constraint\*`
  Constraint traits providing specific key/value/label implementations:
  - `NameKeyTrait` — Key = name
  - `IndexKeyTrait` — Key = index
  - `NameLabelTrait` — Label = formatted name
  - `ValueLabelTrait` — Label = value
  - `NameValueTrait` — Value = name (unit enums)
  - `StringValueTrait` — Value = enum value (string-backed)
  - `StringValueKeyTrait` — Key = enum value (string-backed)
  - `IntValueTrait` — Value = enum value (int-backed)
  - `IntValueKeyTrait` — Key = enum value (int-backed)

### 3.2 Main Entry Points

The main usage pattern is through enum interfaces:

```php
use DecodeLabs\Enumerable\Unit\Named;
use DecodeLabs\Enumerable\Unit\NamedTrait;

enum MyEnum implements Named
{
    use NamedTrait;
    
    case OptionOne;
    case OptionTwo;
}

$enum = MyEnum::fromKey('OptionOne');
$label = $enum->getLabel();
$options = MyEnum::getOptions();
```

---

## 4. Dependencies

### 4.1 Decode Labs

- `decodelabs/coercion` (required)
  Used for type coercion when converting keys and values between types (int/string).

- `decodelabs/exceptional` (required)
  Used for exception handling when instantiation fails (unknown key, value, name, or index).

### 4.2 External

None — Enumerable has no external dependencies beyond Decode Labs packages. It uses PHP's built-in enum functionality.

### 4.3 Optional Integrations

None — all dependencies are required.

---

## 5. Behaviour & Contracts

### 5.1 Invariants

- All enumerable enums implement the `Enum` interface
- All enumerable enums use `EnumTrait` or a specialized trait
- Key, value, and label are consistently typed per enum variant
- Instantiation methods (`from*`) throw exceptions on failure
- Try instantiation methods (`tryFrom*`) return null on failure
- List methods return arrays keyed by enum key
- Comparison methods respect enum case order
- Label generation formats enum names (camelCase/PascalCase to "Title Case")
- Name matching is case-insensitive for first character
- Index is zero-based and matches case order
- `fromAny()` tries multiple instantiation methods in order

### 5.2 Input & Output Contracts

**Enum Interface Operations:**
- `getCases(): array<static>` — Gets all enum cases (alias for `cases()`)
- `getOptions(): array<TKey,string>` — Gets key to label map
- `fromAny(int|string|static|null $value): static` — Creates from any value type (throws on failure)
- `tryFromAny(int|string|static|null $value): ?static` — Creates from any value type (returns null on failure)
- `fromName(?string $name): static` — Creates from case name (throws on failure)
- `tryFromName(?string $name): ?static` — Creates from case name (returns null on failure)
- `nameToLabel(?string $name): ?string` — Converts name to label
- `getName(): string` — Gets case name (with optional camelCase support)
- `getNames(): array<string>` — Gets all case names
- `fromKey(int|string|null $key): static` — Creates from key (throws on failure)
- `tryFromKey(int|string|null $key): ?static` — Creates from key (returns null on failure)
- `getKey(): int|string` — Gets case key
- `getKeys(): array<TKey>` — Gets all keys
- `fromIndex(?int $index): static` — Creates from index (throws on failure)
- `tryFromIndex(?int $index): ?static` — Creates from index (returns null on failure)
- `getIndex(): int` — Gets case index
- `getLabel(): string` — Gets case label
- `fromValue(int|string|null $value): static` — Creates from value (throws on failure)
- `tryFromValue(int|string|null $value): ?static` — Creates from value (returns null on failure)
- `getValues(): array<TKey,TValue>` — Gets key to value map
- `getValue(): int|string` — Gets case value
- `getLessThan(bool $includeSelf = false): array<static>` — Gets cases before this one
- `getNamesLessThan(?string $name, bool $includeSelf = false): array<string>` — Gets names before specified name
- `getGreaterThan(bool $includeSelf = false): array<static>` — Gets cases after this one
- `getNamesGreaterThan(?string $name, bool $includeSelf = false): array<string>` — Gets names after specified name

**Unit Enum Operations:**
- `Named` — Key = name (string), Value = name (string), Label = formatted name
- `Indexed` — Key = index (int), Value = name (string), Label = formatted name

**Backed Enum Operations:**
- `NamedString` — Key = name (string), Value = enum value (string), Label = formatted name
- `LabelledString` — Key = name (string), Value = enum value (string), Label = enum value
- `ValueString` — Key = enum value (string), Value = enum value (string), Label = formatted name
- `NamedInt` — Key = name (string), Value = enum value (int), Label = formatted name
- `ValueInt` — Key = enum value (int), Value = enum value (int), Label = formatted name

### 5.3 Key/Value/Label Semantics

Each enum variant defines key, value, and label semantics:

**Unit Enums:**
- `Named` — Key = case name, Value = case name, Label = formatted name
- `Indexed` — Key = case index, Value = case name, Label = formatted name

**String-Backed Enums:**
- `NamedString` — Key = case name, Value = enum value, Label = formatted name
- `LabelledString` — Key = case name, Value = enum value, Label = enum value
- `ValueString` — Key = enum value, Value = enum value, Label = formatted name

**Int-Backed Enums:**
- `NamedInt` — Key = case name, Value = enum value, Label = formatted name
- `ValueInt` — Key = enum value, Value = enum value, Label = formatted name

### 5.4 Instantiation Methods

Instantiation methods try multiple approaches:
- `fromAny()` — Tries value (int), name (string), value (string) in order
- `fromKey()` — Creates from key (name or value depending on variant)
- `fromValue()` — Creates from enum value (for backed enums) or name (for unit enums)
- `fromName()` — Creates from case name
- `fromIndex()` — Creates from case index

### 5.5 List Generation

List generation methods:
- `getOptions()` — Returns `array<TKey,string>` mapping keys to labels
- `getValues()` — Returns `array<TKey,TValue>` mapping keys to values
- `getCases()` — Returns `array<static>` mapping keys to enum cases (alias for `cases()`)

### 5.6 Comparison Methods

Comparison methods:
- `getLessThan()` — Returns cases before this one in definition order
- `getGreaterThan()` — Returns cases after this one in definition order
- `includeSelf` parameter controls whether current case is included

### 5.7 Label Generation

Label generation:
- Formats enum names from camelCase/PascalCase to "Title Case"
- Handles underscores as word separators
- Handles slashes as word separators
- Converts to title case with proper spacing
- Example: `OptionOne` → `"Option One"`, `my_option` → `"My Option"`

### 5.8 Name Matching

Name matching:
- Case-insensitive for first character
- Supports both exact match and ucfirst match
- Example: `optionOne` and `OptionOne` both match `OptionOne` case

### 5.9 Camel Name Support

Camel name support:
- `CamelName` constant controls name format
- If `true`, `getName()` returns lcfirst(name)
- If `false`, `getName()` returns name as-is
- Default is `false`

---

## 6. Error Handling

- Unknown key throws `Exceptional::InvalidArgument` in `fromKey()`
- Unknown value throws `Exceptional::InvalidArgument` in `fromValue()`
- Unknown name throws `Exceptional::InvalidArgument` in `fromName()`
- Unknown index throws `Exceptional::InvalidArgument` in `fromIndex()`
- Unknown value throws `Exceptional::InvalidArgument` in `fromAny()`
- Try methods return null on failure instead of throwing
- Invalid type coercion may throw exceptions from Coercion

---

## 7. Configuration & Extensibility

- `CamelName` constant can be set to `true` for camelCase name format
- Custom constraint traits can be created for different key/value/label patterns
- Enum interfaces can be extended for additional functionality
- Label generation can be customized by overriding `getLabel()` method
- Name matching can be customized by overriding `tryFromName()` method

---

## 8. Interactions with Other Packages

### 8.1 Coercion

Enumerable uses Coercion for:
- Type conversion when converting keys and values between int and string
- Safe type coercion in try methods
- Type validation in from methods

### 8.2 Exceptional

Enumerable uses Exceptional for:
- All exception handling
- Error reporting for unknown keys, values, names, and indices

### 8.3 Nuance

Nuance uses Enumerable for:
- Enum type inspection
- Enum value representation
- Debugging support

### 8.4 Monarch

Monarch uses Enumerable for:
- Enum-based configuration
- Enum-based service registration
- Runtime enum handling

### 8.5 Slingshot

Slingshot uses Enumerable for:
- Enum-based dependency injection
- Enum parameter resolution
- Service resolution

### 8.6 Atlas

Atlas uses Enumerable for:
- Enum-based file operations
- Enum-based path handling

### 8.7 Harvest

Harvest uses Enumerable for:
- Enum-based HTTP handling
- Enum-based request/response types

### 8.8 Chronicle

Chronicle uses Enumerable for:
- Enum-based release management
- Enum-based version handling

### 8.9 Destiny

Destiny uses Enumerable for:
- Enum-based action types
- Enum-based parameter types
- Enum-based validation

### 8.10 Prophet

Prophet uses Enumerable for:
- Enum-based AI assistant configuration
- Enum-based message types

---

## 9. Usage Examples

### 9.1 Named Unit Enum

```php
use DecodeLabs\Enumerable\Unit\Named;
use DecodeLabs\Enumerable\Unit\NamedTrait;

enum Status implements Named
{
    use NamedTrait;
    
    case Pending;
    case Active;
    case Inactive;
}

$status = Status::fromKey('Pending');
$status->getName();  // 'Pending'
$status->getKey();   // 'Pending'
$status->getLabel(); // 'Pending'
$status->getValue(); // 'Pending'
```

### 9.2 Indexed Unit Enum

```php
use DecodeLabs\Enumerable\Unit\Indexed;
use DecodeLabs\Enumerable\Unit\IndexedTrait;

enum Priority implements Indexed
{
    use IndexedTrait;
    
    case Low;
    case Medium;
    case High;
}

$priority = Priority::fromKey(0);
$priority->getName();  // 'Low'
$priority->getKey();   // 0
$priority->getLabel(); // 'Low'
$priority->getValue(); // 'Low'
```

### 9.3 Named String Backed Enum

```php
use DecodeLabs\Enumerable\Backed\NamedString;
use DecodeLabs\Enumerable\Backed\NamedStringTrait;

enum Color: string implements NamedString
{
    use NamedStringTrait;
    
    case Red = 'red';
    case Green = 'green';
    case Blue = 'blue';
}

$color = Color::fromKey('Red');
$color->getName();  // 'Red'
$color->getKey();   // 'Red'
$color->getLabel(); // 'Red'
$color->getValue(); // 'red'
```

### 9.4 Labelled String Backed Enum

```php
use DecodeLabs\Enumerable\Backed\LabelledString;
use DecodeLabs\Enumerable\Backed\LabelledStringTrait;

enum Status: string implements LabelledString
{
    use LabelledStringTrait;
    
    case Active = 'active';
    case Inactive = 'inactive';
}

$status = Status::fromKey('Active');
$status->getLabel(); // 'active' (from value)
```

### 9.5 Value String Backed Enum

```php
use DecodeLabs\Enumerable\Backed\ValueString;
use DecodeLabs\Enumerable\Backed\ValueStringTrait;

enum Type: string implements ValueString
{
    use ValueStringTrait;
    
    case User = 'user';
    case Admin = 'admin';
}

$type = Type::fromKey('user'); // Key is value
$type->getKey();   // 'user'
$type->getLabel(); // 'Type' (formatted name)
```

### 9.6 Named Int Backed Enum

```php
use DecodeLabs\Enumerable\Backed\NamedInt;
use DecodeLabs\Enumerable\Backed\NamedIntTrait;

enum Level: int implements NamedInt
{
    use NamedIntTrait;
    
    case Beginner = 1;
    case Intermediate = 2;
    case Advanced = 3;
}

$level = Level::fromKey('Beginner');
$level->getValue(); // 1
```

### 9.7 Value Int Backed Enum

```php
use DecodeLabs\Enumerable\Backed\ValueInt;
use DecodeLabs\Enumerable\Backed\ValueIntTrait;

enum Priority: int implements ValueInt
{
    use ValueIntTrait;
    
    case Low = 1;
    case Medium = 2;
    case High = 3;
}

$priority = Priority::fromKey(1); // Key is value
$priority->getKey();   // 1
$priority->getLabel(); // 'Priority' (formatted name)
```

### 9.8 Instantiation Methods

```php
// From key
$enum = MyEnum::fromKey('OptionOne');
$enum = MyEnum::tryFromKey('OptionOne');

// From value
$enum = MyEnum::fromValue('value');
$enum = MyEnum::tryFromValue('value');

// From name
$enum = MyEnum::fromName('OptionOne');
$enum = MyEnum::tryFromName('OptionOne');

// From index
$enum = MyEnum::fromIndex(0);
$enum = MyEnum::tryFromIndex(0);

// From any
$enum = MyEnum::fromAny('OptionOne');
$enum = MyEnum::fromAny(1);
$enum = MyEnum::fromAny($otherEnum);
```

### 9.9 List Generation

```php
// Key to label map
$options = MyEnum::getOptions();
// ['OptionOne' => 'Option One', 'OptionTwo' => 'Option Two']

// Key to value map
$values = MyEnum::getValues();
// ['OptionOne' => 'one', 'OptionTwo' => 'two']

// All cases
$cases = MyEnum::getCases();
// [MyEnum::OptionOne, MyEnum::OptionTwo]
```

### 9.10 Comparison Methods

```php
$enum = MyEnum::OptionTwo;

// Cases before
$before = $enum->getLessThan();
// [MyEnum::OptionOne]

// Cases after
$after = $enum->getGreaterThan();
// [MyEnum::OptionThree]

// Include self
$beforeWithSelf = $enum->getLessThan(true);
// [MyEnum::OptionOne, MyEnum::OptionTwo]
```

### 9.11 Label Generation

```php
enum MyEnum implements Named
{
    use NamedTrait;
    
    case OptionOne;
    case my_option;
    case Some/Path;
}

MyEnum::OptionOne->getLabel();  // 'Option One'
MyEnum::my_option->getLabel();  // 'My Option'
MyEnum::Some/Path->getLabel(); // 'Some / Path'
```

### 9.12 Camel Name Support

```php
enum MyEnum implements Named
{
    use NamedTrait;
    
    public const bool CamelName = true;
    
    case OptionOne;
}

MyEnum::OptionOne->getName(); // 'optionOne' (lcfirst)
```

---

## 10. Implementation Notes (for Contributors)

### 10.1 Trait Composition

Traits are composed from constraint traits:
- Key traits (`NameKeyTrait`, `IndexKeyTrait`, `StringValueKeyTrait`, `IntValueKeyTrait`) define key behavior
- Label traits (`NameLabelTrait`, `ValueLabelTrait`) define label behavior
- Value traits (`NameValueTrait`, `StringValueTrait`, `IntValueTrait`) define value behavior

### 10.2 Label Generation

Label generation algorithm:
1. Replace underscores with spaces
2. Insert spaces before uppercase letters (camelCase detection)
3. Convert to lowercase
4. Convert to title case (ucwords)
5. Insert spaces after slashes

### 10.3 Name Matching

Name matching:
- Exact match: `$case->name === $name`
- Ucfirst match: `$case->name === ucfirst($name)`
- Case-insensitive for first character only

### 10.4 Type Safety

Type safety:
- Uses PHP generics for key and value types
- Constraint traits enforce type relationships
- Coercion ensures type safety in conversions

### 10.5 Comparison Methods

Comparison methods:
- Use case definition order (from `cases()`)
- `getLessThan()` returns cases before current
- `getGreaterThan()` returns cases after current
- `includeSelf` parameter controls inclusion

### 10.6 FromAny Logic

FromAny logic:
1. If value is instance of enum, return it
2. If value is null, return null
3. If value is int, try `fromValue()`
4. If value is string, try `fromName()` then `fromValue()`
5. Return null if all fail

### 10.7 Constraint Traits

Constraint traits provide:
- Key implementation (`getKey()`, `fromKey()`, `tryFromKey()`)
- Value implementation (`getValue()`, `fromValue()`, `tryFromValue()`)
- Label implementation (`getLabel()`)
- Type-specific behavior for unit vs backed enums

### 10.8 Enum Interface

Enum interface provides:
- Unified API across all enum types
- Generic type parameters for key and value
- Consistent method signatures
- Type-safe operations

---

## 11. Testing & Quality

- **Code Quality Score:** 4/5
- **README Quality Score:** 3/5
- **Documentation Score:** 0/5 (this spec)
- **Test Coverage Score:** 0/5

See `composer.json` for supported PHP versions.

---

## 12. Roadmap & Future Ideas

- Add more enum variants if needed
- Improve documentation and usage examples
- Add test coverage
- Consider adding enum validation utilities
- Consider adding enum serialization helpers
- Consider adding enum persistence helpers
- Add more comparison methods
- Consider adding enum filtering methods
- Consider adding enum sorting methods
- Add more label generation options
- Improve type safety and PHPStan support

---

## 13. References

- [Coercion Package](https://github.com/decodelabs/coercion) — Type conversion
- [Exceptional Package](https://github.com/decodelabs/exceptional) — Exception handling
- [Nuance Package](https://github.com/decodelabs/nuance) — Type inspection (uses Enumerable)
- [Monarch Package](https://github.com/decodelabs/monarch) — Service container (uses Enumerable)
- [Slingshot Package](https://github.com/decodelabs/slingshot) — Dependency injection (uses Enumerable)
- [Atlas Package](https://github.com/decodelabs/atlas) — File operations (uses Enumerable)
- [Harvest Package](https://github.com/decodelabs/harvest) — HTTP stack (uses Enumerable)
- [Chronicle Package](https://github.com/decodelabs/chronicle) — Release manager (uses Enumerable)
- [Destiny Package](https://github.com/decodelabs/destiny) — Schedule management (uses Enumerable)
- [Prophet Package](https://github.com/decodelabs/prophet) — AI assistants (uses Enumerable)
- [PHP Enums Documentation](https://www.php.net/manual/en/language.types.enumerations.php) — PHP enum documentation
- [Chorus Package Index](../../../chorus/config/packages.json) — Ecosystem metadata

