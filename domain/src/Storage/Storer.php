<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Storage\Processor\ProcessorInterface;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class Storer
{
    const PREPROCESSOR_STORE  = 'store_processor';
    const PREPROCESSOR_REMOVE = 'remove_processor';
    
    private $storeProcessor;
    private $removeProcessor;
    private $metadataManager;
    
    public function __construct(
        ProcessorInterface $storeProcessor,
        ProcessorInterface $removeProcessor,
        MetadataManager $metadataManager
    ) {
        $this->storeProcessor  = $storeProcessor;
        $this->removeProcessor = $removeProcessor;
        $this->metadataManager = $metadataManager;
    }

    final public function store(Entity $entity): Entity
    {
        $metadata = $this->metadataManager->getForClass(get_class($entity));
        $entity   = $this->storeProcessor->process($entity, $metadata, self::PREPROCESSOR_STORE);

        return $entity;
    }

    final public function remove(Entity $entity): Entity
    {
        $metadata = $this->metadataManager->getForClass(get_class($entity));
        $entity   = $this->removeProcessor->process($entity, $metadata, self::PREPROCESSOR_REMOVE);

        return $entity;
    }
}
