<?php

namespace AdventistCommons\Domain\Hydrator;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface HydratorAwareInterface
{
    public function setHydrator(Hydrator $hydrator): void;
    
    public function getHydrator(): Hydrator;
}
