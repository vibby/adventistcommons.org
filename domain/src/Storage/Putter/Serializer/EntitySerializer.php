<?php

namespace AdventistCommons\Domain\Storage\Putter\Serializer;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\FieldMetadata;

class EntitySerializer
{
    public function serialize(Entity $entity, array $fieldsMetadata): array
    {
        $entityData     = [];
        /**
         * @var string $fieldName
         * @var FieldMetadata $fieldMetadata
         */
        foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
            /** @var SerializerInterface $serializer */
            $serializer     = $fieldMetadata->get('putter_serializer');
            if (! $serializer) {
                throw new \Exception(sprintf('Cannot find a serializer for %s', $fieldName));
            }
            $getMethodName = $fieldMetadata->getEntityMetadata()->propertyToGetter($fieldName);
            $value         = $entity->$getMethodName();
            $entityData    = $serializer::addDataFormatted($entityData, $fieldMetadata, $value);
        }
        
        return $entityData;
    }
}
