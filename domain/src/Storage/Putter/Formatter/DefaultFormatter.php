<?php

namespace AdventistCommons\Domain\Storage\Putter\Formatter;

use AdventistCommons\Domain\Metadata\FieldMetadata;

class DefaultFormatter implements FormatterInterface
{
    public static function addDataFormatted(
        array $entityData,
        FieldMetadata $fieldMetadata,
        $value
    ): array {
        $entityData[$fieldMetadata->getFieldName()] = is_array($value) ? serialize($value) : (string) $value;
        
        return $entityData;
    }
}
