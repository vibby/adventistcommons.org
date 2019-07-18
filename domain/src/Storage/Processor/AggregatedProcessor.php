<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Storage\Storer;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class AggregatedProcessor implements ProcessorInterface
{
	private $processors;
	private $storer;
	
	public function __construct(array $processors)
	{
		foreach ($processors as $processor) {
			if (!$processor instanceof ProcessorInterface) {
				throw new \Exception('Parameter of aggregrated processor must be an array of processors');
			}
		}
		$this->processors = $processors;
	}
	
	public function process(Entity $entity, EntityMetadata $metaData): Entity
	{
		foreach ($this->processors as $processor) {
			$entity = $processor->process($entity, $metaData);
		}
		
		return $entity;
	}
}
