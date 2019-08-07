<?php

namespace AdventistCommons\Domain\Request;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
trait ToArrayTrait
{
    public function toArray(): array
    {
        return $this->items;
    }
}
