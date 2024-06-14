<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Unit;

use DecodeLabs\Enumerable\Enum;
use UnitEnum;

/**
 * @extends Enum<int,string>
 */
interface Indexed extends Enum, UnitEnum
{
}
