<?php

namespace AdventistCommons\Domain\EntityHydrator\Preprocessor;

use AdventistCommons\Domain\EntityMetadata\EntityMetadata;
use AdventistCommons\Domain\EntityHydrator\Hydrator;
use AdventistCommons\Domain\EntityMetadata\FieldMetadata;

class ForeignPreprocessor implements PreprocessorInterface, HydratorAwareInterface
{
	const TYPE = 'foreign';
	
	private $hydrator;
	
	public function setHydrator(Hydrator $hydrator): void
	{
		$this->hydrator = $hydrator;
	}
	
	public function preprocess(array $entityData, EntityMetadata $metadata): array
	{
		/**
		 * @var string $fileField
		 * @var FieldMetadata $metadata
		 */
		foreach ($metadata->getFieldsOfType(self::TYPE) as $fieldName => $fieldMetadata) {
			if (isset($entityData[$fieldName])) {
				foreach ($entityData[$fieldName] as $index => $childData) {
					if ($fieldMetadata->get('multiple')) {
						$entityData[$fieldName][$index] = $this->hydrator->hydrate(
							$fieldMetadata->get('class'),
							$childData
						);
					} else {
						$entityData[$fieldName] = $this->hydrator->hydrate(
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
