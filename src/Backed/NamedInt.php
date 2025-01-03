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
 * Key = name
 * Label = name
 *
 * @extends Enum<string,int>
 */
interface NamedInt extends Enum, BackedEnum
{
}
