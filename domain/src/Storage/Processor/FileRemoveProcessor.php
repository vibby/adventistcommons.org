<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\File\FileSystem;
use AdventistCommons\Domain\Metadata\EntityMetadata;

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
    
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function processOne(Entity $entity, $value, string $fieldName, EntityMetadata $metadata): Entity
    {
        $this->fileSystem->remove($value);
        
        return $entity;
    }
}
