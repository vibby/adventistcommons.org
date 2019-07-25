<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\Putter\Putter;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class PutterProcessor implements ProcessorInterface
{
    private $putter;
    
    public function __construct(Putter $putter)
    {
        $this->putter = $putter;
    }
    
    public function process(Entity $entity, EntityMetadata $entityMetadata, string $action): Entity
    {
        $fieldsMetadata = $entityMetadata->getFieldsForProcessor(self::class, $action);
        $entityData     = [];
        /**
         * @var string $fieldName
         * @var FieldMetadata $fieldMetadata
         */
        foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
            $formatter     = $fieldMetadata->get('putter_formatter');
            $getMethodName = $entityMetadata->propertyToGetter($fieldName);
            $value         = $entity->$getMethodName();
            $entityData    = $formatter::addDataFormatted($entityData, $fieldMetadata, $value);
        }
        $entityId = $this->putter->put($entity, $entityData);
        $entity->setId($entityId);
        
        return $entity;
    }
}
