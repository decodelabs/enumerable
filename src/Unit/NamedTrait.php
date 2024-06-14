<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Unit;

use DecodeLabs\Enumerable\Constraint\NameKeyTrait;
use DecodeLabs\Enumerable\Constraint\NameLabelTrait;
use DecodeLabs\Enumerable\Constraint\Unit\NameValueTrait;

trait NamedTrait
{
    /**
     * @use NameKeyTrait<string>
     */
    use NameKeyTrait;
    use NameLabelTrait;
    use NameValueTrait;
}
