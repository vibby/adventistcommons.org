<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Storage\Storer;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ForeignCreateProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
	/** @var PutterProcessor */
	private $putterProcessor;
	
	public function __construct(PutterProcessor $putterProcessor)
	{
		$this->putterProcessor = $putterProcessor;
	}
	
	protected function processOne(Entity $entity, $value, string $fieldName): Entity
	{
		$setMethodName = EntityMetadata::propertyToSetter($fieldName);
		if (is_array($value)) {
			$changed = [];
			foreach ($value as $index => $otherEntity) {
				if (!$otherEntity instanceof Entity) {
					throw new \Exception('A foreign field value must be an entity or an array of entities');
				}
				$this->createForeign($entity, $otherEntity, $setMethodName);
			}
			$entity->$setMethodName($changed);
		} elseif ($value instanceof Entity) {
			$this->createForeign($entity, $value, $setMethodName);
		} else {
			throw new \Exception('A foreign field value must be an entity or an array of entities');
		}
		
		return $entity;
	}
	
	private function createForeign(Entity &$parent , Entity $foreign, string $setMethodName)
	{
		if (!$foreign->getId()) {
			$parent->$setMethodName($this->putterProcessor->process($foreign, $this->metadataManager->getForClass(get_class($foreign))));
		}
	}
}
