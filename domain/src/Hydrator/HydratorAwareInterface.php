<?php

namespace AdventistCommons\Domain\Hydrator;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface HydratorAwareInterface
{
    public function setHydrator(Hydrator $hydrator): void;
    
    public function getHydrator(): Hydrator;
}
