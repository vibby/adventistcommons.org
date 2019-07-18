<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Storage\Processor\ProcessorInterface;
use AdventistCommons\Domain\Storage\Processor\StorerAwareInterface;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class Storer
{
	private $putter;
	private $processor;
	private $metadataManager;
	
	public function __construct(
		ProcessorInterface $processor,
		MetadataManager $metadataManager
	) {
		$this->processor = $processor;
		$this->metadataManager = $metadataManager;
	}

	final public function store(Entity $entity): Entity
	{
		$metadata = $this->metadataManager->getForClass(get_class($entity));
		$entity = $this->processor->process($entity, $metadata);

		return $entity;
	}
}
