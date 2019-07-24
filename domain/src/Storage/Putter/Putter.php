<?php

namespace AdventistCommons\Domain\Storage\Putter;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Entity\Series;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Entity\ProductAttachment;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class Putter
{
    private $putters;
    
    public function __construct(array $putters)
    {
        foreach ($putters as $putter) {
            if ($putter instanceof ProductPutterInterface) {
                $this->putters[Product::class] = $putter;
            }
            if ($putter instanceof ProductAttachmentPutterInterface) {
                $this->putters[ProductAttachment::class] = $putter;
            }
            if ($putter instanceof SeriesPutterInterface) {
                $this->putters[Series::class] = $putter;
            }
        }
    }
    
    public function put(Entity $entity, array $entityData): int
    {
        if (! isset($this->putters[get_class($entity)])) {
            throw new \Exception(sprintf('Putter is not set for class %s', get_class($entity)));
        }
        
        $putter     = $this->putters[get_class($entity)];
        $methodName = sprintf('put%sAndGetId', EntityMetadata::extractShortClassName($entity));

        return $putter->$methodName($entityData);
    }
}
