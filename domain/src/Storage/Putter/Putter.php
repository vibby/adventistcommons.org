<?php

namespace AdventistCommons\Domain\Storage\Putter;

use AdventistCommons\Domain\Entity;
use AdventistCommons\Domain\Metadata\MetadataManager;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class Putter
{
    private $putters;
    private $metadataManager;
    
    public function __construct(array $putters, MetadataManager $metadataManager)
    {
        $this->metadataManager = $metadataManager;
        foreach ($putters as $putter) {
            if ($putter instanceof ProductPutterInterface) {
                $this->putters[Entity\Product::class] = $putter;
            }
            if ($putter instanceof ProductAttachmentPutterInterface) {
                $this->putters[Entity\ProductAttachment::class] = $putter;
            }
            if ($putter instanceof SeriesPutterInterface) {
                $this->putters[Entity\Series::class] = $putter;
            }
            if ($putter instanceof SeriesPutterInterface) {
                $this->putters[Entity\Series::class] = $putter;
            }
            if ($putter instanceof SectionPutterInterface) {
                $this->putters[Entity\Section::class] = $putter;
            }
        }
    }
    
    public function put(Entity\Entity $entity, array $entityData): int
    {
        if (! isset($this->putters[get_class($entity)])) {
            throw new \Exception(sprintf('Putter is not set for class %s', get_class($entity)));
        }
        
        $putter     = $this->putters[get_class($entity)];
        $methodName = $this->metadataManager->getForClass(get_class($entity))->getPutMethodName();

        return $putter->$methodName($entityData);
    }
}
