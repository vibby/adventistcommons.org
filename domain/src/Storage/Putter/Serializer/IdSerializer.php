<?php

namespace AdventistCommons\Domain\Storage\Putter\Serializer;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\FieldMetadata;

class IdSerializer implements SerializerInterface
{
    public static function addDataFormatted(
        array $entityData,
        FieldMetadata $fieldMetadata,
        $value
    ): array {
        $fieldName              = $fieldMetadata->formatToId();
        $entityData[$fieldName] = $value instanceof Entity
            ? $value->getId()
            : $entityData[$fieldName] = null;
        
        return $entityData;
    }
}
