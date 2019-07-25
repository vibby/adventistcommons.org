<?php

namespace AdventistCommons\Domain\Request;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
trait ToArrayTrait
{
    public function toArray(): array
    {
        return $this->items;
    }
}
