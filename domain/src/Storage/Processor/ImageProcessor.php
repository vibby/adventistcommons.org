<?php

namespace AdventistCommons\Domain\Storage\Processor;

use Gregwar\Image\Image;
use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ImageProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function processOne(Entity $entity, $value, string $fieldName, EntityMetadata $metadata): Entity
    {
        Image::open($value->getAbsolutePath())
            ->useFallback(false)
            ->zoomCrop(768, 768, 0, 0)
            ->save($value->getAbsolutePath());
        
        return $entity;
    }
}
