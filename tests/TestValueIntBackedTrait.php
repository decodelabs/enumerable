<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Tests;

use DecodeLabs\Enumerable\Backed\ValueInt;
use DecodeLabs\Enumerable\Backed\ValueIntTrait;

enum TestValueIntBackedTrait: int implements ValueInt
{
    use ValueIntTrait;

    case OptionOne = 1;
    case OptionTwo = 2;
    case OptionThree = 3;
}
