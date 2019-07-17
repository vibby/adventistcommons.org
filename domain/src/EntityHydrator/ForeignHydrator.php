<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\EntityMetadata\EntityMetadata;

class ForeignHydrator
{
	const TYPE = 'foreign';
	
	public static function buildForeign(array $entityData, EntityMetadata $metadata, Hydrator $hydrator): array
	{
		foreach ($metadata->getFieldsOfType(self::TYPE) as $fieldName => $fieldMetadata) {
			if (isset($entityData[$fieldName])) {
				foreach ($entityData[$fieldName] as $index => $childData) {
					if ($fieldMetadata->get('multiple')) {
						$entityData[$fieldName][$index] = $hydrator->hydrate(
							$fieldMetadata->get('class'),
							$childData
						);
					} else {
						$entityData[$fieldName] = $hydrator->hydrate(
							$fieldMetadata->get('class'),
							$childData
						);
					}
				}
			}
		}
		
		return $entityData;
	}
}
