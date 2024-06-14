<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Backed;

use DecodeLabs\Enumerable\Constraint\Backed\StringValueTrait;
use DecodeLabs\Enumerable\Constraint\NameKeyTrait;
use DecodeLabs\Enumerable\Constraint\NameLabelTrait;

trait NamedStringTrait
{
    /**
     * @use NameKeyTrait<string>
     */
    use NameKeyTrait;
    use NameLabelTrait;
    use StringValueTrait;
}
