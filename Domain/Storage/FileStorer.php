<?php

namespace AdventistCommons\Domain\Storage;

use AdventistCommons\Domain\File\Uploaded;

class FileStorer
{
	private $basePath;
	
	public function __construct($basePath)
	{
		$this->basePath = $basePath;
	}
	
	public function storeFiles($entity, array $properties)
	{
		foreach ($properties as $propertyName) {
			$getMethodName = sprintf('get%s', ucfirst($propertyName));
			$file = $entity->$getMethodName();
			
			if ($file instanceof Uploaded) {
				$setMethodName = sprintf('set%s', ucfirst($propertyName));
				$entity->$setMethodName($file->makeDefinitive($this->basePath));
			}
		}
		
		return $entity;
	}
}
