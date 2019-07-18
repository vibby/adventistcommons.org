<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\File\FileSystem;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class UploadProcessor implements ProcessorInterface
{
	protected $fileSystem;
	
	public function __construct(FileSystem $fileSystem)
	{
		$this->fileSystem = $fileSystem;
	}
	
	public function process(Entity $entity, EntityMetadata $entityMetadata): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForStoreProcessor(self::class);
		foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
			$entity = $this->moveUploadedFile($entity, $fieldName);
		}
		
		return $entity;
	}
	
	protected function moveUploadedFile(Entity $entity, string $propertyName): Entity
	{
		$getMethodName = EntityMetadata::propertyToGetter($propertyName);
		/** @var File $file */
		$file = $entity->$getMethodName();
		
		if ($file instanceof Uploaded) {
			$setMethodName = EntityMetadata::propertyToSetter($propertyName);
			$definitiveFile = $this->fileSystem->makeUploadedDefinitive($file);
			$entity->$setMethodName($definitiveFile);
		}
		
		return $entity;
	}
}
