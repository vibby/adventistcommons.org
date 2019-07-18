<?php

namespace AdventistCommons\Domain\Storage\Preprocessor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class XliffPreprocessor implements PreprocessorInterface
{
	protected $fileSystem;
	
	public function __construct()
	{
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
