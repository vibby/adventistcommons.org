<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class FileRemoveProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
	protected $fileSystem;
	
	public function __construct(FileSystem $fileSystem)
	{
		$this->fileSystem = $fileSystem;
	}
	
	protected function processOne(Entity $entity, $value, string $fieldName): Entity
	{
		$this->fileSystem->remove($file);
		
		return $entity;
	}
}
