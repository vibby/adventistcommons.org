<?php

namespace AdventistCommons\Domain\Storage\Preprocessor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\File\FileSystem;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class UploadPreprocessor implements PreprocessorInterface
{
	protected $fileSystem;
	
	public function __construct(FileSystem $fileSystem)
	{
		$this->fileSystem = $fileSystem;
	}
	
	public function preprocess(Entity $entity, EntityMetadata $entityMetadata): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForStorePreprocess(self::class);
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
