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
		$fieldName = $fieldMetadata->formatToId();
		if ($value instanceof Entity) {
			$entityData[$fieldName] = $value->getId();
		} else {
			$entityData[$fieldName] = null;
		}
		
		return $entityData;
	}
}
