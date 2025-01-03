<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Backed;

use BackedEnum;
use DecodeLabs\Enumerable\Enum;

/**
 * Key = value
 * Label = name
 *
 * @extends Enum<int,int>
 */
interface ValueInt extends Enum, BackedEnum
{
}
