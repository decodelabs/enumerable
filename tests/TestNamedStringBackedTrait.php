<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Tests;

use DecodeLabs\Enumerable\Backed\NamedString;
use DecodeLabs\Enumerable\Backed\NamedStringTrait;

enum TestNamedStringBackedTrait: string implements NamedString
{
    use NamedStringTrait;

    case OptionOne = 'a';
    case OptionTwo = 'b';
    case OptionThree = 'c';
}
