<?php

/**
 * Enumerable
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Tests;

use DecodeLabs\Enumerable\Unit\Indexed;
use DecodeLabs\Enumerable\Unit\IndexedTrait;

enum TestIndexedUnitTrait implements Indexed
{
    use IndexedTrait;

    case OptionOne;
    case OptionTwo;
    case OptionThree;
}
