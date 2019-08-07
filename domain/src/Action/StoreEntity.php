<?php

namespace AdventistCommons\Domain\Action;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\Storer;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class StoreEntity
{
    private $storer;
    
    public function __construct(
        Storer $storer
    ) {
        $this->storer = $storer;
    }
    
    public function act(Entity $entity): Entity
    {
        $entity = $this->storer->store($entity);
        
        return $entity;
    }
}
