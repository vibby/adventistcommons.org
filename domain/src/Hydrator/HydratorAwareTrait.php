<?php

namespace AdventistCommons\Domain\Hydrator;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
trait HydratorAwareTrait
{
    /** @var Hydrator */
    private $hydrator;

    public function setHydrator(Hydrator $hydrator): void
    {
        $this->hydrator = $hydrator;
    }
    
    public function getHydrator(): Hydrator
    {
        return $this->hydrator;
    }
}
