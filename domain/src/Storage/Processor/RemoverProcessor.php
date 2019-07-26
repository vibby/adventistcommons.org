<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\Storer;
use AdventistCommons\Domain\Storage\Remover\Remover;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class RemoverProcessor implements ProcessorInterface
{
    private $remover;
    
    public function __construct(Remover $remover)
    {
        $this->remover = $remover;
    }
    
    public function process(Entity $entity, string $action): Entity
    {
        if ($action == Storer::PREPROCESSOR_REMOVE) {
            $this->remover->remove($entity);
        }
        
        return $entity;
    }
    
    public function getPriority(): int
    {
        return 80;
    }
}
