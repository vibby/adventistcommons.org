<?php

namespace AdventistCommons\Domain\Storage\Putter\Formatter;

use AdventistCommons\Domain\Metadata\FieldMetadata;

interface FormatterInterface
{
    public static function addDataFormatted(
        array $entityData,
        FieldMetadata $fieldMetadata,
        $value
    ): array;
}
