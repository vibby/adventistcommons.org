<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
abstract class AbstractFieldBasedProcessor
{
	public function process(Entity $entity, EntityMetadata $entityMetadata, string $action): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForProcessor(self::class, $action);
		foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
			$getMethodName = $entityMetadata::propertyToGetter($fieldName);
			$value = $entity->$getMethodName();
			if ($value) {
				$entity = $this->processOne($value);				
			}
		}
		
		return $entity;
	}
	
	abstract protected function processOne(Entity $entity, $value, string $fieldName): Entity;
}
