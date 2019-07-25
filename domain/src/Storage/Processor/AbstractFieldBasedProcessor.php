<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
abstract class AbstractFieldBasedProcessor
{
    protected $action;
    
    public function process(Entity $entity, EntityMetadata $entityMetadata, string $action): Entity
    {
        $this->action   = $action;
        $fieldsMetadata = $entityMetadata->getFieldsForProcessor(static::class, $action);
        foreach (array_keys($fieldsMetadata) as $fieldName) {
            $getMethodName = $entityMetadata->propertyToGetter($fieldName);
            $value         = $entity->$getMethodName();
            if ($value) {
                $entity = $this->processOne($entity, $value, $fieldName, $entityMetadata);
            }
        }
        
        return $entity;
    }
    
    abstract protected function processOne(Entity $entity, $value, string $fieldName, EntityMetadata $metadata): Entity;
}
