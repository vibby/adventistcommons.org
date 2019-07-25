<?php

namespace AdventistCommons\Domain\Storage\Putter\Formatter;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\FieldMetadata;

class IdFormatter implements FormatterInterface
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
