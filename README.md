# Enumerable

[![PHP from Packagist](https://img.shields.io/packagist/php-v/decodelabs/enumerable?style=flat)](https://packagist.org/packages/decodelabs/enumerable)
[![Latest Version](https://img.shields.io/packagist/v/decodelabs/enumerable.svg?style=flat)](https://packagist.org/packages/decodelabs/enumerable)
[![Total Downloads](https://img.shields.io/packagist/dt/decodelabs/enumerable.svg?style=flat)](https://packagist.org/packages/decodelabs/enumerable)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/decodelabs/enumerable/integrate.yml?branch=develop)](https://github.com/decodelabs/enumerable/actions/workflows/integrate.yml)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-44CC11.svg?longCache=true&style=flat)](https://github.com/phpstan/phpstan)
[![License](https://img.shields.io/packagist/l/decodelabs/enumerable?style=flat)](https://packagist.org/packages/decodelabs/enumerable)

### Helper traits for enums

Enumerable provides a simple structure of interfaces and traits to unlock the full power of PHP enums.

_Get news and updates on the [DecodeLabs blog](https://blog.decodelabs.com)._

---

## Installation

Install via Composer:

```bash
composer require decodelabs/enumerable
```

## Usage

Enumerable defines a powerful top level Enum interface that expands the range of functionality enums provide whilst consolidating the same functionality across both <code>UnitEnum</code> and <code>BackedEnum</code> types.

All Enumerable enums implement a type specific interface and use an accompanying trait. Each form dictates a type for a <code>key</code>, <code>value</code> and <code>label</code> property, where the key is used as the index in lists and the label is used for display purposes.


## Unit enums

### Named UnitEnum

```php
use DecodeLabs\Enumerable\Unit\Named;
use DecodeLabs\Enumerable\Unit\NamedTrait;

enum MyNamedUnitEnum implements Named
{
    use NamedTrait;

    const OptionOne;
    const OptionTwo;
    const OptionThree;
}

MyNamedUnitEnum::OptionOne->getName();  // 'OptionOne'
MyNamedUnitEnum::OptionOne->getKey();   // 'OptionOne'
MyNamedUnitEnum::OptionOne->getLabel(); // 'Option One'
MyNamedUnitEnum::OptionOne->getValue(); // 'OptionOne'
```

### Indexed UnitEnum

```php
use DecodeLabs\Enumerable\Unit\Indexed;
use DecodeLabs\Enumerable\Unit\IndexedTrait;

enum MyIndexedUnitEnum implements Indexed
{
    use IndexedTrait;

    const OptionOne;
    const OptionTwo;
    const OptionThree;
}

MyNamedUnitEnum::OptionOne->getName();  // 'OptionOne'
MyNamedUnitEnum::OptionOne->getKey();   // 0
MyNamedUnitEnum::OptionOne->getLabel(); // 'Option One'
MyNamedUnitEnum::OptionOne->getValue(); // 'OptionOne'
```

## Backed enums

### Named String BackedEnum

```php
use DecodeLabs\Enumerable\Backed\NamedString;
use DecodeLabs\Enumerable\Backed\NamedStringTrait;

enum MyNamedStringBackedEnum : string implements NamedString
{
    use NamedStringTrait;

    const OptionOne = 'one';
    const OptionTwo = 'two';
    const OptionThree = 'three';
}

MyNamedStringBackedEnum::OptionOne->getName();  // 'OptionOne'
MyNamedStringBackedEnum::OptionOne->getKey();   // 'OptionOne'
MyNamedStringBackedEnum::OptionOne->getLabel(); // 'Option One'
MyNamedStringBackedEnum::OptionOne->getValue(); // 'one'
```

### Labelled String BackedEnum

```php
use DecodeLabs\Enumerable\Backed\LabelledString;
use DecodeLabs\Enumerable\Backed\LabelledStringTrait;

enum MyLabelledStringBackedEnum : string implements LabelledString
{
    use LabelledStringTrait;

    const OptionOne = 'one';
    const OptionTwo = 'two';
    const OptionThree = 'three';
}

MyLabelledStringBackedEnum::OptionOne->getName();  // 'OptionOne'
MyLabelledStringBackedEnum::OptionOne->getKey();   // 'OptionOne'
MyLabelledStringBackedEnum::OptionOne->getLabel(); // 'one'
MyLabelledStringBackedEnum::OptionOne->getValue(); // 'one'
```

### Value String BackedEnum

```php
use DecodeLabs\Enumerable\Backed\ValueString;
use DecodeLabs\Enumerable\Backed\ValueStringTrait;

enum MyValueStringBackedEnum : string implements ValueString
{
    use ValueStringTrait;

    const OptionOne = 'one';
    const OptionTwo = 'two';
    const OptionThree = 'three';
}

MyValueStringBackedEnum::OptionOne->getName();  // 'OptionOne'
MyValueStringBackedEnum::OptionOne->getKey();   // 'one'
MyValueStringBackedEnum::OptionOne->getLabel(); // 'Option One'
MyValueStringBackedEnum::OptionOne->getValue(); // 'one'
```

### Named Int BackedEnum

```php
use DecodeLabs\Enumerable\Backed\NamedInt;
use DecodeLabs\Enumerable\Backed\NamedIntTrait;

enum MyNamedIntBackedEnum : int implements NamedInt
{
    use NamedIntTrait;

    const OptionOne = 1;
    const OptionTwo = 2;
    const OptionThree = 3;
}

MyNamedIntBackedEnum::OptionOne->getName();  // 'OptionOne'
MyNamedIntBackedEnum::OptionOne->getKey();   // 'OptionOne'
MyNamedIntBackedEnum::OptionOne->getLabel(); // 'Option One'
MyNamedIntBackedEnum::OptionOne->getValue(); // 1
```

### Value Int BackedEnum

```php
use DecodeLabs\Enumerable\Backed\ValueInt;
use DecodeLabs\Enumerable\Backed\ValueIntTrait;

enum MyValueIntBackedEnum : int implements ValueInt
{
    use ValueIntTrait;

    const OptionOne = 1;
    const OptionTwo = 2;
    const OptionThree = 3;
}

MyValueIntBackedEnum::OptionOne->getName();  // 'OptionOne'
MyValueIntBackedEnum::OptionOne->getKey();   // 1
MyValueIntBackedEnum::OptionOne->getLabel(); // 'Option One'
MyValueIntBackedEnum::OptionOne->getValue(); // 1
```

## Instantiation

All enum types can be instantiaed with the following methods:

```php
MyEnum::fromKey('<key>');
MyEnum::tryFromKey('<key>');
MyEnum::fromValue('<value>');
MyEnum::tryFromValue('<value>');
MyEnum::fromName('<name>');
MyEnum::tryFromName('<name>');
MyEnum::fromIndex('<index>');
MyEnum::tryFromIndex('<index>');
```


## Lists

Enumerable provides three main ways of listing cases:

```php
// Key to label map
MyEnum::getOptions() => [
    '<key>' => '<label>',
];

// Key to value map
MyEnum::getValues() => [
    '<key>' => '<value>',
];

// Alias to cases()
MyEnum::getCases() => [
    '<key>' => '[MyEnum::<name>]',
];
```

## Licensing

Enumerable is licensed under the MIT License. See [LICENSE](./LICENSE) for the full license text.
