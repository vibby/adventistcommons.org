<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Storage\Storer;
use AdventistCommons\Domain\File\FileSystem;
use AdventistCommons\Domain\Metadata\MetadataManager;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class FileRemoveProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
    protected $fileSystem;
    
    public function __construct(MetadataManager $metadataManager, FileSystem $fileSystem)
    {
        parent::__construct($metadataManager);
        $this->fileSystem = $fileSystem;
    }
    
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function processOne(Entity $entity, $value, string $fieldName): Entity
    {
        if ($this->action == Storer::PREPROCESSOR_REMOVE) {
            $this->fileSystem->remove($value);
        }
        
        return $entity;
    }
    
    public function getPriority(): int
    {
        return 70;
    }
}
