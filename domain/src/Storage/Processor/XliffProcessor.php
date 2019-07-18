<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class XliffProcessor implements ProcessorInterface
{
	protected $fileSystem;
	
	public function __construct()
	{
	}
	
	public function process(Entity $entity, EntityMetadata $entityMetadata): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForStoreProcessor(self::class);
		foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
			// @TODO : treate XLIFF file to add associated stuff
		}
		
		return $entity;
	}
}
