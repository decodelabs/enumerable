<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Tests;

use DecodeLabs\Enumerable\Backed\NamedInt;
use DecodeLabs\Enumerable\Backed\NamedIntTrait;

enum TestNamedIntBackedTrait: int implements NamedInt
{
    use NamedIntTrait;

    case OptionOne = 1;
    case OptionTwo = 2;
    case OptionThree = 3;
}
