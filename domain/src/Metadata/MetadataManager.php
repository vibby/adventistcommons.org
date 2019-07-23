<?php

namespace AdventistCommons\Domain\Metadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class MetadataManager
{
    private $metadataByClassName;
    
    public function getForClass($className): EntityMetadata
    {
        if (!isset($this->metadataByClassName[$className])) {
            if (!method_exists($className, '__getMetaData')) {
                throw new \Exception(sprintf(
                    'Cannot get metadata on this object : %s. __getMetaData() method is missing',
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
