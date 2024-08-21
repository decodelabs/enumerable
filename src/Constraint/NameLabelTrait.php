<?php

/**
 * @package Enumerable
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Enumerable\Constraint;

trait NameLabelTrait
{
    public function getLabel(): string
    {
        $name = str_replace('_', ' ', $this->name);
        $name = (string)preg_replace('/([^ A-Z])([A-Z\/])/u', '$1 $2', $name);
        $name = ucwords(strtolower($name));
        $name = (string)preg_replace('/([\/])([^ ])/u', '$1 $2', $name);
        return $name;
    }
}
