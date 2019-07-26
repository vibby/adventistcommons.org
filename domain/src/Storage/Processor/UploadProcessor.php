<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\File\FileSystem;
use AdventistCommons\Domain\Metadata\MetadataManager;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class UploadProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
    /** @var FileSystem */
    protected $fileSystem;
    
    public function __construct(MetadataManager $metadataManager, FileSystem $fileSystem)
    {
        parent::__construct($metadataManager);
        $this->fileSystem = $fileSystem;
    }
    
    protected function processOne(Entity $entity, $value, string $fieldName): Entity
    {
        $entityMetadata = $this->metadataManager->getForClass(get_class($entity));
        if (! $value instanceof File) {
            throw new \Exception('An uploadable property must be a file');
        }
        if ($value instanceof Uploaded) {
            $definitiveFile = $this->fileSystem->makeUploadedDefinitive($value);
            $setMethodName  = $entityMetadata->propertyToSetter($fieldName);
            $entity->$setMethodName($definitiveFile);
        }
        
        return $entity;
    }
    
    public function getPriority(): int
    {
        return 10;
    }
}
