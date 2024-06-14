<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Tests;

use DecodeLabs\Enumerable\Backed\ValueString;
use DecodeLabs\Enumerable\Backed\ValueStringTrait;

enum TestValueStringBackedTrait: string implements ValueString
{
    use ValueStringTrait;

    case OptionOne = 'a';
    case OptionTwo = 'b';
    case OptionThree = 'c';
}
