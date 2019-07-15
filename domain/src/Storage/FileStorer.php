<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\Uploaded;
use Gregwar\Image\Image;
use AdventistCommons\Domain\File\FileSystem;

class FileStorer
{
	protected $fileSystem;
	
	public function __construct(FileSystem $fileSystem)
	{
		$this->fileSystem = $fileSystem;
	}
	
	public function storeFiles($entity, array $properties)
	{
		foreach ($properties as $propertyName) {
			$getMethodName = sprintf('get%s', ucfirst($propertyName));
			/** @var File $file */
			$file = $entity->$getMethodName();
			
			if ($file instanceof Uploaded) {
				$setMethodName = sprintf('set%s', ucfirst($propertyName));
				$entity->$setMethodName($this->fileSystem->makeDefinitive($file));
			}
		}
		
		return $entity;
	}
	
	public function storeImages($entity, array $properties)
	{
		foreach ($properties as $propertyName) {
			$getMethodName = sprintf('get%s', ucfirst($propertyName));
			/** @var File $file */
			$file = $entity->$getMethodName();
			
			if ($file instanceof Uploaded) {
				Image::open($file->getPath())
					->useFallback(false)
					->zoomCrop(768, 768, 0, 0)
					->save($file->getPath());
				$setMethodName = sprintf('set%s', ucfirst($propertyName));
				$entity->$setMethodName($this->fileSystem->makeDefinitive($file));
			}
		}
		
		return $entity;
	}
}
