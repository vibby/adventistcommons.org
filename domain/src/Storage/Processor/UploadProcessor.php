<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\File\FileSystem;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class UploadProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
    protected $fileSystem;
    
    public function __construct(FileSystem $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }
    
    protected function processOne(Entity $entity, $value, string $fieldName, EntityMetadata $metadata): Entity
    {
        if (! $value instanceof File) {
            throw new \Exception('An uploadable property must be a file');
        }
        if ($value instanceof Uploaded) {
            $definitiveFile = $this->fileSystem->makeUploadedDefinitive($value);
            $setMethodName  = $metadata->propertyToSetter($fieldName);
            $entity->$setMethodName($definitiveFile);
        }
        
        return $entity;
    }
}
