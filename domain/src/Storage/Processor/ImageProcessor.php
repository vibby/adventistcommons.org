<?php

namespace AdventistCommons\Domain\Storage\Processor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\File\File;
use Gregwar\Image\Image;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ImageProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
    protected function processOne(Entity $entity, $value, string $fieldName): Entity
    {
        Image::open($value->getAbsolutePath())
            ->useFallback(false)
            ->zoomCrop(768, 768, 0, 0)
            ->save($value->getAbsolutePath());
        
        return $entity;
    }
}
