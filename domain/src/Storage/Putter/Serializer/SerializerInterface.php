<?php

namespace AdventistCommons\Domain\Storage\Putter\Serializer;

use AdventistCommons\Domain\Metadata\FieldMetadata;

interface SerializerInterface
{
    public static function addDataFormatted(
        array $entityData,
        FieldMetadata $fieldMetadata,
        $value
    ): array;
}
