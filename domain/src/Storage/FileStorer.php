<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\Uploaded;
use Gregwar\Image\Image;

class FileStorer
{
	protected $basePath;
	
	public function __construct($basePath)
	{
		$this->basePath = $basePath;
	}
	
	public function storeFiles($entity, array $properties)
	{
		foreach ($properties as $propertyName) {
			$getMethodName = sprintf('get%s', ucfirst($propertyName));
			/** @var File $file */
			$file = $entity->$getMethodName();
			
			if ($file instanceof Uploaded) {
				$setMethodName = sprintf('set%s', ucfirst($propertyName));
				$entity->$setMethodName($file->makeDefinitive($this->basePath));
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
//				Image::open($file->getPath())
//					->zoomCrop(768, 768, 0, 0)
//					->save($file->getPath());
				$setMethodName = sprintf('set%s', ucfirst($propertyName));
				$entity->$setMethodName($file->makeDefinitive($this->basePath));
			}
		}
		
		return $entity;
	}
}
