<?php

namespace AdventistCommons\Domain\Storage\Preprocessor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Storage\Storer;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class AggregatedPreprocessor implements PreprocessorInterface, StorerAwareInterface
{
	private $preprocessors;
	private $storer;
	
	public function __construct(array $preprocessors)
	{
		foreach ($preprocessors as $preprocessor) {
			if (!$preprocessor instanceof PreprocessorInterface) {
				throw new \Exception('Parameter of aggregrated preprocessor must be an array of preprocessors');
			}
		}
		$this->preprocessors = $preprocessors;
	}
	
	public function setStorer(Storer $storer): void
	{
		$this->storer = $storer;
	}
	
	public function preprocess(Entity $entity, EntityMetadata $metaData): Entity
	{
		foreach ($this->preprocessors as $preprocessor) {
			if ($preprocessor instanceof StorerAwareInterface) {
				$preprocessor->setStorer($this->storer);
			}
			$entity = $preprocessor->preprocess($entity, $metaData);
		}
		
		return $entity;
	}
}
