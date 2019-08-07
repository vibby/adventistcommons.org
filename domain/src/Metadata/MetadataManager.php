<?php

namespace AdventistCommons\Domain\Metadata;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class MetadataManager
{
    private $metadataByClassName;
    
    public function getForClass($className): EntityMetadata
    {
        if (! isset($this->metadataByClassName[$className])) {
            if (! method_exists($className, 'getEntityMetadata')) {
                throw new \Exception(sprintf(
                    'Cannot get metadata on this object : %s. getEntityMetadata() method is missing',
                    $className
                ));
            }
            
            $this->metadataByClassName[$className] = new EntityMetadata(
                $className,
                $className::getEntityMetadata()
            );
        }
        
        return $this->metadataByClassName[$className];
    }
}
