<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Backed;

use DecodeLabs\Enumerable\Constraint\Backed\StringValueKeyTrait;
use DecodeLabs\Enumerable\Constraint\Backed\StringValueTrait;
use DecodeLabs\Enumerable\Constraint\NameLabelTrait;

trait ValueStringTrait
{
    use StringValueKeyTrait;
    use NameLabelTrait;
    use StringValueTrait;
}
