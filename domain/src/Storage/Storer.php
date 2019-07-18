<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Storage\Preprocessor\PreprocessorInterface;
use AdventistCommons\Domain\Storage\Preprocessor\StorerAwareInterface;
use AdventistCommons\Domain\Storage\Putter\Putter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class Storer
{
	private $putter;
	private $preprocessor;
	private $metadataManager;
	
	public function __construct(
		Putter $putter,
		PreprocessorInterface $preprocessor,
		MetadataManager $metadataManager
	) {
		$this->putter = $putter;
		$this->preprocessor = $preprocessor;
		$this->metadataManager = $metadataManager;
	}

	final public function store(Entity $entity): Entity
	{
		$metadata = $this->metadataManager->getForClass(get_class($entity));
		if ($this->preprocessor instanceof StorerAwareInterface) {
			$this->preprocessor->setStorer($this);
		}
		$entity = $this->preprocessor->preprocess($entity, $metadata);
		$entityData = ArrayFormater::formatToArray($entity);
		$id = $this->putter->put($entity, $entityData);
		$entity->setId($id);

		return $entity;
	}
}
