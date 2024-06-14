<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Tests;

use DecodeLabs\Enumerable\Unit\Named;
use DecodeLabs\Enumerable\Unit\NamedTrait;

enum TestNamedUnitTrait implements Named
{
    use NamedTrait;

    case OptionOne;
    case OptionTwo;
    case OptionThree;
}
