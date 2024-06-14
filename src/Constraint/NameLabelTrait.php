<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint;

use DecodeLabs\Dictum;

trait NameLabelTrait
{
    public function getLabel(): string
    {
        return Dictum::name($this->name);
    }
}
