<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\Storer;
use AdventistCommons\Domain\Storage\Putter\Putter;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Storage\Putter\Serializer\EntitySerializer;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class PutterProcessor implements ProcessorInterface
{
    /** @var MetadataManager */
    private $metadataManager;

    /** @var Putter $putter */
    private $putter;
    
    /** @var EntitySerializer */
    private $entitySerializer;
    
    public function __construct(MetadataManager $metadataManager, EntitySerializer $entitySerializer, Putter $putter)
    {
        $this->metadataManager  = $metadataManager;
        $this->entitySerializer = $entitySerializer;
        $this->putter           = $putter;
    }
    
    public function process(Entity $entity, string $action): Entity
    {
        if ($action == Storer::PREPROCESSOR_STORE) {
            $entityMetadata = $this->metadataManager->getForClass(get_class($entity));
            $fieldsMetadata = $entityMetadata->getFieldsForProcessor(PutterProcessor::class, $action);
            $entityData     = $this->entitySerializer->serialize($entity, $fieldsMetadata);
            $entityId       = $this->putter->put($entity, $entityData);
            $entity->setId($entityId);
        }
        
        return $entity;
    }
    
    public function getPriority(): int
    {
        return 50;
    }
}
