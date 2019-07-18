<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class AggregatedNormalizer implements NormalizerInterface, HydratorAwareInterface
{
	private $normalizers;
	private $hydrator;
	
	public function __construct(array $normalizers)
	{
		foreach ($normalizers as $normalizer) {
			if (!$normalizer instanceof NormalizerInterface) {
				throw new \Exception('Parameter of aggregrated normalizer must be an array of normalizers');
			}
		}
		$this->normalizers = $normalizers;
	}
	
	public function setHydrator(Hydrator $hydrator): void
	{
		$this->hydrator = $hydrator;
	}
	
	public function normalize(array $entityData, EntityMetadata $metaData): array
	{
		foreach ($this->normalizers as $normalizer) {
			if ($normalizer instanceof HydratorAwareInterface) {
				$normalizer->setHydrator($this->hydrator);
			}
			$entityData = $normalizer->normalize($entityData, $metaData);
		}
		
		return $entityData;
	}
}
