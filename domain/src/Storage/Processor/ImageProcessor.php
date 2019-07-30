<?php

namespace AdventistCommons\Domain\Storage\Processor;

use Gregwar\Image\Image;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\Entity\Entity;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ImageProcessor extends AbstractFieldBasedProcessor implements ProcessorInterface
{
    /**
     * @param Entity $entity
     * @param $value
     * @param string $fieldName
     * @return Entity
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function processOne(Entity $entity, $value, string $fieldName): Entity
    {
        if (! $value instanceof File) {
            throw new \Exception('Cannot treat as an image something that is nos a file');
        }
        Image::open($value->getAbsolutePath())
            ->useFallback(false)
            ->zoomCrop(768, 768, 0, 0)
            ->save($value->getAbsolutePath());
        
        return $entity;
    }
    
    public function getPriority(): int
    {
        return 20;
    }
}
