<?php

namespace AdventistCommons\Domain\EntityMetadata;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;

class MetadataManager
{
	private $metadataByClassName;
	
	public function getForClass($className)
	{
		if (!isset($this->metadataByClassName[$className])) {
			if (!method_exists($className, '__getMetaData')) {
				throw new \Exception(sprintf(
					'Cannot metadata on this object : %s. __getMetaData() method is missing',
					$className
				));
			}
			
			$this->metadataByClassName[$className] = new EntityMetadata(
				$className,
				$className::__getMetaData()
			);
		}
		
		return $this->metadataByClassName[$className];
	}
}
