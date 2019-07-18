<?php

namespace AdventistCommons\Domain\Storage\Preprocessor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Storage\Storer;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ForeignPreprocessor implements PreprocessorInterface, StorerAwareInterface
{
	private $storer;
	
	public function __construct()
	{
	}
	
	public function setStorer(Storer $storer): void
	{
		$this->storer = $storer;
	}
	
	public function preprocess(Entity $entity, EntityMetadata $entityMetadata): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForStorePreprocess(self::class);
		foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
			// @TODO : treate XLIFF file to add associated stuff
		}
		
		return $entity;
	}
}
