<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Storage\Storer;
use AdventistCommons\Domain\Metadata\MetadataManager;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ForeignCreateProcessor implements ProcessorInterface{
	/** @var PutterProcessor */
	private $persistProcessor;
	
	/** @var MetadataManager */
	private $metadataManager;
	
	public function __construct(PutterProcessor $persistProcessor, MetadataManager $metadataManager)
	{
		$this->persistProcessor = $persistProcessor;
		$this->metadataManager = $metadataManager;
	}
	
	public function process(Entity $entity, EntityMetadata $entityMetadata): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForStoreProcessor(self::class);
		foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
			$getMethodName = $entityMetadata::propertyToGetter($fieldName);
			$setMethodName = $entityMetadata::propertyToSetter($fieldName);
			$foreign = $entity->$getMethodName();
			if (is_array($foreign)) {
				$changed = [];
				foreach ($foreign as $index => $otherEntity) {
					$this->createForeign($entity, $otherEntity, $setMethodName);
				}
				$entity->$setMethodName($changed);
			} elseif ($foreign instanceof Entity) {
				$this->createForeign($entity, $foreign, $setMethodName);
			}
		}
		
		return $entity;
	}
	
	private function createForeign(Entity &$parent , Entity $foreign, string $setMethodName)
	{
		if (!$foreign->getId()) {
			$parent->$setMethodName($this->persistProcessor->process($foreign, $this->metadataManager->getForClass(get_class($foreign))));
		}
	}
}
