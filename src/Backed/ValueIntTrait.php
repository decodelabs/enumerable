<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Backed;

use DecodeLabs\Enumerable\Constraint\Backed\IntValueKeyTrait;
use DecodeLabs\Enumerable\Constraint\Backed\IntValueTrait;
use DecodeLabs\Enumerable\Constraint\NameLabelTrait;

trait ValueIntTrait
{
    use IntValueKeyTrait;
    use IntValueTrait;
    use NameLabelTrait;
}
