<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Storage\Putter\Putter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class PutterProcessor implements ProcessorInterface
{
	private $putter;
	
	public function __construct(Putter $putter)
	{
		$this->putter = $putter;
	}
	
	public function process(Entity $entity, EntityMetadata $entityMetadata): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForStoreProcessor(self::class);
		$entityData = [];
		/**
		 * @var string $fieldName
		 * @var FieldMetadata $fieldMetadata
		 */
		foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
			$formatter = $fieldMetadata->get('persist_formatter');
			$getMethodName = $entityMetadata::propertyToGetter($fieldName);
			$value = $entity->$getMethodName();
			$entityData = $formatter::addDataFormatted($entityData, $fieldMetadata, $value);
		}
		$id = $this->putter->put($entity, $entityData);
		$entity->setId($id);
		
		return $entity;
	}
}
