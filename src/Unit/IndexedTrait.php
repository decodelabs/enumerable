<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Unit;

use DecodeLabs\Enumerable\Constraint\IndexKeyTrait;
use DecodeLabs\Enumerable\Constraint\NameLabelTrait;
use DecodeLabs\Enumerable\Constraint\Unit\NameValueTrait;

/**
 * @phpstan-require-implements Indexed
 */
trait IndexedTrait
{
    /**
     * @use IndexKeyTrait<string>
     */
    use IndexKeyTrait;
    use NameLabelTrait;
    use NameValueTrait;
}
