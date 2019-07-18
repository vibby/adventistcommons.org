<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Storage\Preprocessor\PreprocessorInterface;
use AdventistCommons\Domain\Storage\Preprocessor\StorerAwareInterface;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class Storer
{
	private $productPutter;
	private $preprocessor;
	private $metadataManager;
	
	public function __construct(
		ProductPutterInterface $productPutter,
		PreprocessorInterface $preprocessor,
		MetadataManager $metadataManager
	) {
		/** @TODO do not use productPutter put a service that gives the right putter */
		$this->productPutter = $productPutter;
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
		$productData = ArrayFormater::formatToArray($entity);

		$id = $this->productPutter->putProductAndGetId($productData);
		$entity->setId($id);

		return $entity;
	}
}
