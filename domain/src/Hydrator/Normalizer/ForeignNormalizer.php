<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Metadata\FieldMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ForeignNormalizer implements NormalizerInterface, HydratorAwareInterface
{
	/** @var Hydrator */
	private $hydrator;
	
	public function setHydrator(Hydrator $hydrator): void
	{
		$this->hydrator = $hydrator;
	}
	
	public function normalize(iterable $entityData, EntityMetadata $entityMetadata): iterable
	{
		/**
		 * @var string $fieldName
		 * @var FieldMetadata $fieldMetadata
		 */
		foreach ($entityMetadata->getFieldsForHydratorNormalizer(self::class) as $fieldName => $fieldMetadata) {
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
