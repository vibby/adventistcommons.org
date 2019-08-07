<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\MetadataManager;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
abstract class AbstractFieldBasedProcessor
{
    protected $action;
    protected $metadataManager;
    
    public function __construct(MetadataManager $metadataManager)
    {
        $this->metadataManager = $metadataManager;
    }
    
    public function process(Entity $entity, string $action): Entity
    {
        $this->action   = $action;
        $entityMetadata = $this->metadataManager->getForClass(get_class($entity));
        $fieldsMetadata = $entityMetadata->getFieldsForProcessor(static::class, $action);
        foreach (array_keys($fieldsMetadata) as $fieldName) {
            $getMethodName = $entityMetadata->propertyToGetter($fieldName);
            $value         = $entity->$getMethodName();
            if ($value) {
                $entity = $this->processOne($entity, $value, $fieldName);
            }
        }
        
        return $entity;
    }
    
    abstract protected function processOne(Entity $entity, $value, string $fieldName): Entity;
}
