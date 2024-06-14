<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Backed;

use DecodeLabs\Enumerable\Constraint\Backed\StringValueTrait;
use DecodeLabs\Enumerable\Constraint\Backed\ValueLabelTrait;
use DecodeLabs\Enumerable\Constraint\NameKeyTrait;

trait LabelledStringTrait
{
    /**
     * @use NameKeyTrait<string>
     */
    use NameKeyTrait;
    use ValueLabelTrait;
    use StringValueTrait;
}
