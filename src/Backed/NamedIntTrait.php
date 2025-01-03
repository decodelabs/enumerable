<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Backed;

use DecodeLabs\Enumerable\Constraint\Backed\IntValueTrait;
use DecodeLabs\Enumerable\Constraint\NameKeyTrait;
use DecodeLabs\Enumerable\Constraint\NameLabelTrait;

/**
 * @phpstan-require-implements NamedInt
 */
trait NamedIntTrait
{
    /**
     * @use NameKeyTrait<int>
     */
    use NameKeyTrait;
    use NameLabelTrait;
    use IntValueTrait;
}
