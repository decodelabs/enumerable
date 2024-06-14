<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Tests;

use DecodeLabs\Enumerable\Backed\LabelledString;
use DecodeLabs\Enumerable\Backed\LabelledStringTrait;

enum TestLabelledStringBackedTrait: string implements LabelledString
{
    use LabelledStringTrait;

    case OptionOne = 'a';
    case OptionTwo = 'b';
    case OptionThree = 'c';
}
