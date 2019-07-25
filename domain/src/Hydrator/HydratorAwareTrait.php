<?php

namespace AdventistCommons\Domain\Hydrator;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
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
    
    protected function getHydrator()
    {
        return $this->hydrator;
    }
}
