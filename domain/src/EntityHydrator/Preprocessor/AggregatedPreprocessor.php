<?php

namespace AdventistCommons\Domain\EntityHydrator\Preprocessor;

use AdventistCommons\Domain\EntityHydrator\Hydrator;
use AdventistCommons\Domain\EntityMetadata\EntityMetadata;

class AggregatedPreprocessor implements PreprocessorInterface, HydratorAwareInterface
{
	private $preprocessors;
	private $hydrator;
	
	public function __construct(array $preprocessors)
	{
		foreach ($preprocessors as $preprocessor) {
			if (!$preprocessor instanceof PreprocessorInterface) {
				throw new \Exception('Parameter of aggregrated preprocessor must be an array of preprocessors');
			}
		}
		$this->preprocessors = $preprocessors;
	}
	
	public function setHydrator(Hydrator $hydrator): void
	{
		$this->hydrator = $hydrator;
	}
	
	public function preprocess(array $entityData, EntityMetadata $metaData): array
	{
		foreach ($this->preprocessors as $preprocessor) {
			if ($preprocessor instanceof HydratorAwareInterface) {
				$preprocessor->setHydrator($this->hydrator);
			}
			$entityData = $preprocessor->preprocess($entityData, $metaData);
		}
		
		return $entityData;
	}
}
