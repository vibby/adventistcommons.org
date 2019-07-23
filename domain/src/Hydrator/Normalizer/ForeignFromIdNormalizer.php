<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Metadata\FieldMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ForeignFromIdNormalizer implements NormalizerInterface, HydratorAwareInterface
{
	/** @var Hydrator */
	private $hydrator;
	
	public function setHydrator(Hydrator $hydrator): void
	{
		$this->hydrator = $hydrator;
	}
	
	public function normalize(array $entityData, EntityMetadata $entityMetadata): array
	{
		/**
		 * @var string $fieldName
		 * @var FieldMetadata $fieldMetadata
		 */
		foreach ($entityMetadata->getFieldsForHydratorNormalizer(self::class) as $fieldName => $fieldMetadata) {
			$fieldIdName = $fieldMetadata->formatToId();
			if (isset($entityData[$fieldIdName])) {
				$entityData[$fieldName] = $this->hydrator->hydrate(
					$fieldMetadata->get('class'),
					['id' => $entityData[$fieldIdName]]
				);
			}
		}
		
		return $entityData;
	}
}
