<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface ProcessorInterface
{
    public function process(Entity $entity, string $action): Entity;
    
    public function getPriority(): int;
}
