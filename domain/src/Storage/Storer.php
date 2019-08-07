<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\Processor\ProcessorInterface;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Storer
{
    const PREPROCESSOR_STORE  = 'store_processor';
    const PREPROCESSOR_REMOVE = 'remove_processor';
    
    private $processor;
    
    public function __construct(
        ProcessorInterface $processor
    ) {
        $this->processor       = $processor;
    }

    final public function store(Entity $entity): Entity
    {
        if ($this->processor instanceof StorerAwareInterface) {
            $this->processor->setStorer($this);
        }
        $entity   = $this->processor->process($entity, self::PREPROCESSOR_STORE);

        return $entity;
    }

    final public function remove(Entity $entity): Entity
    {
        if ($this->processor instanceof StorerAwareInterface) {
            $this->processor->setStorer($this);
        }
        $entity   = $this->processor->process($entity, self::PREPROCESSOR_REMOVE);

        return $entity;
    }
}
